<?php
session_start();

if ($_SESSION['username']) {
    $user_username = $_SESSION['username'];
} elseif (!$no_redirect_login) {
    header('Location: ../accounts/login');
    exit();
}
?>