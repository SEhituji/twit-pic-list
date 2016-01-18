<?php
session_start();
session_destroy();

unset($_SESSION);
$_SESSION = [];
header("Location: login.php");
