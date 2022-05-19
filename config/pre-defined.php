<?php

return [
    'price' => [
        'min_landscape_design'   => env('PRICE_MIN_LANDSCAPE_DESIGN', '$20,000'),
        'min_weekly_maintenance' => env('PRICE_MIN_WEEKLY_MAINTENANCE', '$450.00'),
        'min_turf_care'          => env('PRICE_MIN_TURF_CARE', '$50.00'),
    ],
    'warranty_paragraph' => env('WARRANTY_PARAGRAPH', 'Per our agreements, we have a “One-year limited warranty on all plants and sod (with one replacement) and proper irrigation. Plants and sod not properly cared for will void the warranty. Perennials are not covered under any warranty.” If you believe you are under warranty please fill out the form below for our team to review.'),

];
