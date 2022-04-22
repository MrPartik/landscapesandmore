<?php

return [
    'api_key' => env('STREAK_API_KEY'),
    'api_domain' => env('STREAK_API_DOMAIN', 'https://www.streak.com/'),
    'installation_pipeline_key' => env('STREAK_PIPELINE_INSTALLATION'),
    'maintenance_pipeline_key' => env('STREAK_PIPELINE_MAINTENANCE'),
    'warranty_claim_pipeline_key' => env('STREAK_PIPELINE_WARRANTY')
];
