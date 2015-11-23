<?php

return [
    'notnot' => [
        'respon_type' => 'code',
        'client_id' => env('NOTNOT_CLIENT_ID', 'clientId'),
        'client_secret' => env('NOTNOT_CLIENT_SECRET', 'clientSecret'),
        'redirect_uri' => env('NOTNOT_REDIRECT_URI', 'http://scaffold.dev/admin/notes/access-code'),
        'url_authorize' => 'http://notnot.dev/oauth/authorization',
        'url_access_token' => 'http://notnot.dev/oauth/access-token'
    ]
];