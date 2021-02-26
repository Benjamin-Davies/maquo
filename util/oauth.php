<?php

$oauth_secret_file = __DIR__.'/../client_secret.json';
if (file_exists($oauth_secret_file)) {
  $oauth = json_decode(file_get_contents($oauth_secret_file));
} elseif (getenv('OAUTH_CLIENT_ID')) {
  $oauth = (object) [
    'web' => (object) [
      'client_id' => getenv('OAUTH_CLIENT_ID'),
    ],
  ];
}
