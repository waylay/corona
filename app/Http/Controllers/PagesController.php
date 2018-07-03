<?php

namespace App\Http\Controllers;

use Validator;
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
        return view('gate', $this->viewData());
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

    public function viewData()
    {
        $viewData           = [];
        $viewData['months'] = [
            '1'  => trans('form.january'),
            '2'  => trans('form.february'),
            '3'  => trans('form.march'),
            '4'  => trans('form.april'),
            '5'  => trans('form.may'),
            '6'  => trans('form.june'),
            '7'  => trans('form.july'),
            '8'  => trans('form.august'),
            '9'  => trans('form.september'),
            '10' => trans('form.october'),
            '11' => trans('form.november'),
            '12' => trans('form.december')
        ];

        return $viewData;
    }
}
