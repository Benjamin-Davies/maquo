<?php
session_start();

if (isset($_SESSION['username'])) {
    $user_username = $_SESSION['username'];
} elseif (!$no_redirect_login) {
    $url = urlencode($_SERVER['REQUEST_URI']);
    header("Location: ../accounts/login?redirect=$url");
    exit();
}
?>