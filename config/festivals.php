<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Festival data
    |--------------------------------------------------------------------------
    |
    */

    'halifax' => [
        'id'       => '1',
        'slug'     => 'halifax',
        'start'    => 'August 11, 2018 16:00 CDT',
        'end'      => 'August 11, 2018 22:00 CDT',
        'artists'  => [
            ['Amtrac'],
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
            ['Crooked Colours'],
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
            ['Hot Chip DJ Set', 'Thomas Jack'],
            ['Christian Löffler', 'Nitin'],
        ],
        'tickets' => 'https://www.eventbrite.ca/e/corona-sunsets-festival-toronto-tickets-48062649679',
        'link' => 'https://www.sunnysidepavilion.com',
    ],

    'winnipeg' => [
        'id'       => '4',
        'slug'     => 'winnipeg',
        'start'    => 'August 11, 2018 18:00 CDT',
        'end'      => 'August 11, 2018 24:00 CDT',
        'artists'  => [
            ['Christian Martin'],
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
            ['Claptone'],
            ['Kidnap'],
            ['Case of the Mondays'],
        ],
        'tickets' => 'https://www.eventbrite.ca/e/corona-sunsets-festival-whistler-tickets-48063124098',
        'link' => 'https://www.whistlerblackcomb.com/the-mountain/more-options/on-mountain-dining.aspx?page=viewall',
    ],
];