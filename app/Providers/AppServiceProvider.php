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
                'reminder' => 'Aug 11th - 6PM-12AM ADT',
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
                'reminder' => 'Aug 11th - 6PM-11PM EST',
                'artists'  => [
                    ['Blue Rodeo', 'Matt Anderson'],
                    ['The Zolas', 'Barney Bentall', 'Kip Moore'],
                    ['Logan Staats', 'Kongos', 'Edward'],
                ],
                'tickets' => false,
                'link' => 'https://www.sunnysidepavilion.com',
            ],

            'toronto' => [
                'id'       => '3',
                'slug'     => 'toronto',
                'reminder' => 'Aug 11th - 6PM-11PM EST',
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
                'reminder' => 'Aug 11th - 6PM-11PM EST',
                'artists'  => [
                    ['Blue Rodeo', 'Matt Anderson'],
                    ['The Zolas', 'Barney Bentall', 'Kip Moore'],
                    ['Logan Staats', 'Kongos', 'Edward'],
                ],
                'tickets' => false,
                'link' => 'https://www.sunnysidepavilion.com',
            ],

            'whistler' => [
                'id'       => '5',
                'slug'     => 'whistler',
                'reminder' => 'Aug 11th - 6PM-11PM EST',
                'artists'  => [
                    ['Blue Rodeo', 'Matt Anderson'],
                    ['The Zolas', 'Barney Bentall', 'Kip Moore'],
                    ['Logan Staats', 'Kongos', 'Edward'],
                ],
                'tickets' => 'https://www.eventbrite.ca/coronasunsets/whistler',
                'link' => 'https://www.sunnysidepavilion.com',
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
