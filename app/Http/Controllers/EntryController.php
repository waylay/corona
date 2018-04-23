<?php

namespace App\Http\Controllers;

use App\Entry;
use App\Mail\NewEntry;
use App\Note;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class EntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = [
            'data' => Entry::with(['notes' => function ($query) {
                $query->latest();
            }, 'notes.user'])->get()
        ];

        return $data;
    }

    /**
     * Check for legal drinking age.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function gate(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validEntry = $request->validate([
            'firstname'  => 'required',
            'lastname'   => 'required',
            'email'      => 'required|email',
            'phone'      => 'required',
            'address'    => 'required',
            'address2'   => 'nullable',
            'city'       => 'required',
            'province'   => 'required',
            'postalcode' => [
                'required',
                'regex:/^[ABCEGHJKLMNPRSTVXY]\d[ABCEGHJKLMNPRSTVWXYZ] ?\d[ABCEGHJKLMNPRSTVWXYZ]\d$/i', // Canadian Postal Code
            ],
            'imei'                 => 'required|digits:15|unique:entries',
            'purchased'            => 'required',
            'receipt'              => 'required|mimes:jpeg,gif,png|max:10240',
            'g-recaptcha-response' => 'required|captcha'
        ], [
            'imei.digits' => trans('form.valid_imei'),
            'imei.unique' => trans('form.unique_imei'),
        ]);

        // Remove reCaptcha from the fields
        unset($validEntry['g-recaptcha-response']);

        // Store the Language used when form was submitted
        $validEntry['postalcode'] = strtoupper($validEntry['postalcode']);

        // Store the Language used when form was submitted
        $validEntry['language'] = \App::getLocale();

        // Store the entry
        $entry = Entry::forceCreate($validEntry);

        // Resize and store the receipt
        $receipt_path = $this->saveImage($entry, $request->file('receipt'));

        // Update the entry with the new receipt path
        $entry->update([
            'receipt' => $receipt_path
        ]);

        // Queue an email confirmation
        // Mail::to($entry->email)->send(new NewEntry($entry));

        // Done, redirect visitor to thank you page
        return redirect('/thankyou');
    }

    /**
     * Save the uploaded receipt.
     *
     * @param  \App\Entry  $entry
     * @param  File  $receipt
     * @return string $path
     */
    public function saveImage(Entry $entry, $receipt)
    {
        // Upload the receipt and rename it using the entry ID
        // $receipt_path = $request->file('receipt')->storeAs('receipts', $entry->id.'.'.$request->file('receipt')->extension(), 'public');
        $path = $entry->id . '.jpg';

        // Resize and encode image as JPG
        $image = Image::make($receipt)->resize(1200, 1200, function ($constraint) {
            // Keep the aspect ratio
            $constraint->aspectRatio();
            // And do not upscale
            $constraint->upsize();
        })->stream('jpg', 90);

        // Save it to storage
        Storage::disk('receipts')->put($path, $image);

        return Storage::disk('receipts')->url($path);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Entry  $entry
     * @return \Illuminate\Http\Response
     */
    public function show(Entry $entry)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Entry  $entry
     * @return \Illuminate\Http\Response
     */
    public function edit(Entry $entry)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Entry  $entry
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Entry $entry)
    {
        $entry->emailed   = $request->has('emailed') ? 1 : 0;
        $entry->validated = $request->has('validated') ? 1 : 0;
        $entry->shipped   = $request->has('shipped') ? 1 : 0;

        try {
            if ($request->has('note') && !empty($request['note'])) {
                $note = new Note([
                    'note'       => $request['note'],
                    'user_id'    => Auth::id(),
                    'created_at' => Carbon::now(),
                ]);
                $entry->notes()->save($note);
            }
            $entry->save();

            return response()->json([
                'success' => true,
                'data'    => $entry->load([
                            'notes' => function ($query) {  $query->latest(); },
                            'notes.user'
                ]),
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'success' => 'false',
                'errors'  => $e->getMessage(),
            ], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Entry  $entry
     * @return \Illuminate\Http\Response
     */
    public function destroy(Entry $entry)
    {
        //
    }
}
