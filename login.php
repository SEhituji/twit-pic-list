<?php
session_start();
require_once ('twitteroauth/twitteroauth.php');

// Consumer keyの値
$consumer_key = getenv('CON_KEY');
// Consumer secretの値
$consumer_secret = getenv('CON_SECRET');

// OAuthオブジェクト生成
$to = new TwitterOAuth($consumer_key, $consumer_secret);
// callbackURLを指定してRequest tokenを取得
$gip = getenv('GIP')
$tok = $to->getRequestToken(" http://". $gip ."/twit/callback.php");
// セッションに保存
$_SESSION['request_token']=$token=$tok['oauth_token'];
$_SESSION['request_token_secret'] = $tok['oauth_token_secret'];
// AuthorizeURLを取得
$url = $to->getAuthorizeURL($token);
echo "<html><head><title>login</title></head><body><a href=\"". $url ."\">ログイン</a></body></html>";