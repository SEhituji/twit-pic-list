<?php
require_once ('twitteroauth/twitteroauth.php');

// Consumer keyの値
define("CON_KEY", getenv('CON_KEY'));
// Consumer secretの値
define("CON_SECRET", getenv('CON_SECRET'));
// グローバルＩＰ読み込み
$gip = getenv('GIP');