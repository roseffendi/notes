<?php

return [
    'notnot' => [
        'client_id' => 'clientId',
        'client_secret' => 'clientSecret',
        'redirect_uri' => route('admin.notes.note.access-code.get'),
        'url_authorize' => 'http://notnot.dev/oauth/authoriztion',
        'url_access_token' => 'http://notnot.dev/oauth/access-token'
    ]
];