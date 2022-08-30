<?php
require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/dotenv-loader.php';
 
use Auth0\SDK\Auth0;
 
$domain        = getenv('dev-j5kstq09.us.auth0.com');
$client_id     = getenv('AuWLYt3FUvEAWadpfh9x6aiIPxkq4NyR');
$client_secret = getenv('ABgxKX42_91_VIbT9mzn1-mSJBBVN_oNBL6WmOfWmRK4SXtDViPKXZ3tr4svi4NY');
$redirect_uri  = getenv('http://localhost/My');
$audience      = getenv('http://localhost/My/home.php');
 
// if($audience == ''){
// $audience = 'https://' . $domain . '/userinfo';
// }
 
$auth0 = new Auth0([
  'domain' => $domain,
  'client_id' => $client_id,
  'client_secret' => $client_secret,
  'redirect_uri' => $redirect_uri,
  'audience' => $audience,
  'scope' => 'openid profile',
  'persist_id_token' => true,
  'persist_access_token' => true,
  'persist_refresh_token' => true,
]);
 
$auth0->login();