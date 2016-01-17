<?php
require_once ('twitteroauth/twitteroauth.php');

// Consumer keyの値
$consumer_key = getenv('CON_KEY');
// Consumer secretの値
$consumer_secret = getenv('CON_SECRET');
// グローバルＩＰ読み込み
$gip = getenv('GIP')