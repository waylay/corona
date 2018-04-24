<?php

namespace App\Http\Controllers;

use App\Entry;
use App\Mail\NewEntry;
use Validator;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class EntryController extends Controller
{
    /**
     * Display all the entries
     *
     * @return Illuminate\Support\Collection $data
     */
    public function index()
    {
        //
        $data = [
            'data' => Entry::all()
        ];

        return $data;
    }

    /**
     * Check for legal drinking age.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function gate(Request $request)
    {
        // Only allow dates in the last 100 years range
        $current_year          = Carbon::now()->year;
        $hundred_years_ago     = (new Carbon('100 years ago'))->year;

        $validator             = Validator::make($request->all(), [
            'month'    => 'required|digits_between:1,12',
            'day'      => 'required|digits_between:1,31',
            'year'     => 'required|integer|digits:4|between:' . $hundred_years_ago . ',' . $current_year,
            'province' => 'required',
        ]);

        // Check if the combined date fields make a valid date
        $validator->after(function ($validator) {
            if (!$this->isValidDate()) {
                $validator->errors()->add('date', trans('form.date-error'));
            }
        });

        if ($validator->fails()) {
            return redirect('/')
                    ->withErrors($validator)
                    ->withInput();
        }

        if ($this->isLegalDrinkingAge()) {
            return redirect('signup');
        } else {
            return redirect('underage');
        }
    }

    public function signup(Request $request)
    {
        if ($request->session()->has('birthday') && $request->session()->has('province')) {
            return view('signup');
        }

        return redirect('/');
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
            'firstname'  => 'required|alpha',
            'lastname'   => 'required|alpha',
            'email'      => 'required|email',
            'province'   => 'required',
            'agree'      => 'required'
        ]);

        unset($validEntry['agree']);

        // Get the birthday from session
        $validEntry['birthday'] = session('birthday');

        // Get the province from session
        $validEntry['province'] = session('province');

        // Store the Language used when form was submitted
        $validEntry['language'] = \App::getLocale();

        // Store the entry
        $entry = Entry::forceCreate($validEntry);

        // Queue an email notification
        Mail::to($entry->email)->send(new NewEntry($entry));

        // Done, redirect visitor to thank you page
        return redirect('/thankyou');
    }

    /**
     * Check if the date is valid
     *
     * @return bool
     */
    private function isValidDate()
    {
        return checkdate(
            request('month'),
            request('day'),
            request('year')
        );
    }

    /**
     * Check if the user is of legal drinking age
     *
     * @return bool
     */
    private function isLegalDrinkingAge()
    {
        $birthday = Carbon::createFromFormat('Y-m-d', request('year') . '-' . request('month') . '-' . request('day'));
        $age      = intval($birthday->diff(Carbon::now())->format('%y'));

        $drinking_age = 19;
        if (in_array(request('province'), ['Alberta', 'Manitoba', 'Quebec'])) {
            $drinking_age = 18;
        }

        if ($age >= $drinking_age) {
            session([
                'birthday'    => $birthday,
                'province'    => request('province')
            ]);

            return true;
        }

        return false;
    }
}
