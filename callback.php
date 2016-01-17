<?php
session_start();
require_once ('../config/config.php');
require_once ('../vendor/autoload.php');

use Abraham\TwitterOAuth\TwitterOAuth;

//login.phpでセットしたセッション
$request_token = array();  // [] は array() の短縮記法。詳しくは以下の「追々記」参照
$request_token['oauth_token'] = $_SESSION['oauth_token'];
$request_token['oauth_token_secret'] = $_SESSION['oauth_token_secret'];

//Twitterから返されたOAuthトークンと、あらかじめlogin.phpで入れておいたセッション上のものと一致するかをチェック
if (isset($_REQUEST['oauth_token']) && $request_token['oauth_token'] !== $_REQUEST['oauth_token']) {
    die( 'Error!' );
}

//OAuth トークンも用いて TwitterOAuth をインスタンス化
$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $request_token['oauth_token'], $request_token['oauth_token_secret']);

//アプリでは、access_token(配列になっています)をうまく使って、Twitter上のアカウントを操作していきます
$_SESSION['access_token'] = $connection->oauth("oauth/access_token", array("oauth_verifier" => $_REQUEST['oauth_verifier']));
/*
ちなみに、この変数の中に、OAuthトークンとトークンシークレットが配列となって入っています。
*/

//セッションIDをリジェネレート
session_regenerate_id();

// token keyとtoken secret, user_id, screen_nameをセッションに保存
$_SESSION['oauth_token']        = $access_token['oauth_token'];
$_SESSION['oauth_token_secret'] = $access_token['oauth_token_secret'];
$_SESSION['user_id']            = $access_token['user_id'];
$_SESSION['screen_name']        = $access_token['screen_name'];

// TOPページへ
header("Location: index.php");