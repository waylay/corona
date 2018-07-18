<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \Schema::defaultStringLength(191);

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

        $viewData['provinces'] = [
            'British Columbia'          => 'BC',
            'Ontario'                   => 'ON',
            'Newfoundland and Labrador' => 'NL',
            'Nova Scotia'               => 'NS',
            'Prince Edward Island'      => 'PE',
            'New Brunswick'             => 'NB',
            'Quebec'                    => 'QC',
            'Manitoba'                  => 'MB',
            'Saskatchewan'              => 'SK',
            'Alberta'                   => 'AB',
            'Northwest Territories'     => 'NT',
            'Nunavut'                   => 'NU',
            'Yukon Territory'           => 'YT',
        ];

        $viewData['festivals'] = [
            'halifax' => [
                'id'       => '1',
                'slug'     => 'halifax',
                'start'    => 'August 11, 2018 16:00 CDT',
                'end'      => 'August 11, 2018 22:00 CDT',
                'artists'  => [
                    ['Blue Rodeo', 'Matt Anderson'],
                    ['The Zolas', 'Barney Bentall', 'Kip Moore'],
                    ['Logan Staats', 'Kongos', 'Edward'],
                ],
                'tickets' => false,
                'link' => false,
            ],

            'quebec' => [
                'id'       => '2',
                'slug'     => 'quebec',
                'start'    => 'August 11, 2018 18:00 EDT',
                'end'      => 'August 11, 2018 23:00 EDT',
                'artists'  => [
                    ['Blue Rodeo', 'Matt Anderson'],
                    ['The Zolas', 'Barney Bentall', 'Kip Moore'],
                    ['Logan Staats', 'Kongos', 'Edward'],
                ],
                'tickets' => false,
                'link' => 'http://restodelice.com',
            ],

            'toronto' => [
                'id'       => '3',
                'slug'     => 'toronto',
                'start'    => 'August 11, 2018 18:00 EDT',
                'end'      => 'August 11, 2018 23:00 EDT',
                'artists'  => [
                    ['Blue Rodeo', 'Matt Anderson'],
                    ['The Zolas', 'Barney Bentall', 'Kip Moore'],
                    ['Logan Staats', 'Kongos', 'Edward'],
                ],
                'tickets' => 'https://www.eventbrite.ca/coronasunsets/toronto',
                'link' => 'https://www.sunnysidepavilion.com',
            ],

            'winnipeg' => [
                'id'       => '4',
                'slug'     => 'winnipeg',
                'start'    => 'August 11, 2018 18:00 CDT',
                'end'      => 'August 11, 2018 24:00 CDT',
                'artists'  => [
                    ['Blue Rodeo', 'Matt Anderson'],
                    ['The Zolas', 'Barney Bentall', 'Kip Moore'],
                    ['Logan Staats', 'Kongos', 'Edward'],
                ],
                'tickets' => false,
                'link' => 'http://www.tavernunited.com',
            ],

            'whistler' => [
                'id'       => '5',
                'slug'     => 'whistler',
                'start'    => 'August 11, 2018 19:00 PDT',
                'end'      => 'August 11, 2018 24:00 PDT',
                'artists'  => [
                    ['Blue Rodeo', 'Matt Anderson'],
                    ['The Zolas', 'Barney Bentall', 'Kip Moore'],
                    ['Logan Staats', 'Kongos', 'Edward'],
                ],
                'tickets' => 'https://www.eventbrite.ca/coronasunsets/whistler',
                'link' => 'https://www.whistlerblackcomb.com/the-mountain/more-options/on-mountain-dining.aspx?page=viewall',
            ],
        ];

        \View::share($viewData);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
