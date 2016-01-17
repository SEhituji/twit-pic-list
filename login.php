<?php
session_start();
require_once ('config.php');

// OAuthオブジェクト生成
$to = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET);
// callbackURLを指定してRequest tokenを取得
$tok = $to->getRequestToken(" http://". GIP ."/twit/callback.php");
// セッションに保存
$_SESSION['request_token']=$token=$tok['oauth_token'];
$_SESSION['request_token_secret'] = $tok['oauth_token_secret'];
// AuthorizeURLを取得
$url = $to->getAuthorizeURL($token);
echo "<html><head><title>login</title></head><body><a href=\"". $url ."\">ログイン</a></body></html>";