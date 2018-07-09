<?php

namespace App\Http\Controllers;

use Validator;
use App\Entry;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * Display the gate
     *
     */
    public function gate()
    {
        return view('gate');
    }

    /**
     * Display the underage message
     *
     */
    public function underage()
    {
        return view('underage');
    }

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
    public function checkAge(Request $request)
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
            return redirect('festival');
        } else {
            return redirect('underage');
        }
    }

    /**
     * Main Festivals Page
     *
     * @return bool
     */
    public function main(Request $request)
    {
        if ($request->session()->has('birthday') && $request->session()->has('province')) {
            return view('main');
        }

        return redirect('/');
    }

    /**
     * Learn More Page
     *
     * @return bool
     */
    public function more(Request $request)
    {
        if ($request->session()->has('birthday') && $request->session()->has('province')) {
            return view('more');
        }

        return redirect('/')->withErrors(['year' => ['required']]);
        ;
    }

    /**
     * Festival's City Page
     *
     * @return bool
     */
    public function festival($city)
    {
        if (request()->session()->has('birthday') && request()->session()->has('province')) {
            $festivals = \View::shared('festivals');
            if (array_key_exists($city, $festivals)) {
                $viewData['festival']            = $festivals[$city];
                $viewData['festival_background'] = ' style="background: url(/images/slider-' . $city . '.jpg) no-repeat top center/cover;"';

                return view('festival', $viewData);
            }
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
            'name'       => 'required',
            'phone'      => 'sometimes|required_without:email|max:11',
            'email'      => 'required_without:phone|max:70',
            'agree'      => 'required'
        ], [
            'unique' => trans('form.email_unique')
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
        // Mail::to($entry->email)->send(new NewEntry($entry));

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
