<?php
session_start();
require_once ('twitteroauth/twitteroauth.php');

// セッションにアクセストークンがなかったらloginページに飛ぶ
if($_SESSION['oauth_token']===NULL && $_SESSION['oauth_token_secret']===NULL){
	echo "<p><a href=\"./login.php\">ログイン</a></p>";
}

$user_id = $_SESSION['user_id'];
$screen_name = $_SESSION['screen_name'];
echo "<html><head><title>top</title></head><body>";
echo "<p>ようこそ！".$screen_name."さん</p>";
echo "<p>".$user_id."</p>";
echo "<p><a href=\"./logout.php\">ログアウト</a></p>";