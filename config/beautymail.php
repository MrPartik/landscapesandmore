<?php

return [

    // These CSS rules will be applied after the regular template CSS

    /*
        'css' => [
            '.button-content .button { background: red }',
        ],
    */

    'colors' => [

        'highlight' => '#004ca3',
        'button'    => '#004cad',

    ],

    'view' => [
        'senderName'  => null,
        'reminder'    => null,
        'unsubscribe' => null,
        'address'     => null,

        'logo' => [
            'path'   => (env('APP_ENV') === 'local' ) ? 'https://www.landscapesandmore.com/wp-content/uploads/2018/07/icon1-59d69228234b2.png' : '%PUBLIC%/' . env('LOGO_SMALL_URL'),
            'width'  => '100',
            'height' => 'auto',
        ],
    ],

];
