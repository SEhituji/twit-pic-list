<?php
session_start();

// �Z�b�V�����ϐ���S�ĉ�������
$_SESSION = array();

// �Z�b�V������ؒf����ɂ̓Z�b�V�����N�b�L�[���폜����B
// Note: �Z�b�V������񂾂��łȂ��Z�b�V������j�󂷂�B
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time()-42000, '/');
}
session_destroy();

header("Location: login.php");
