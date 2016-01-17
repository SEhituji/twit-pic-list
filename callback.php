<?php
session_start();
require_once ('config.php');

// パラメータからoauth_verifierを取得
$verifier = $_GET['oauth_verifier'];

// Consumer key,Consumer secret, Request token, Request secretを使ってOAuthオブジェクト生成
$to = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $_SESSION['request_token'], $_SESSION['request_token_secret']);
// oauth_verifierを使ってAccess tokenを取得
$access_token = $to->getAccessToken($verifier);

// token keyとtoken secret, user_id, screen_nameをセッションに保存
$_SESSION['oauth_token']        = $access_token['oauth_token'];
$_SESSION['oauth_token_secret'] = $access_token['oauth_token_secret'];
$_SESSION['user_id']            = $access_token['user_id'];
$_SESSION['screen_name']        = $access_token['screen_name'];

// TOPページへ
header("Location: index.php");