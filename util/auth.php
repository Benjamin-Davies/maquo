<?php
require_once __DIR__.'/db/users.php';

session_start();

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} elseif (!$no_redirect_login) {
    $url = urlencode($_SERVER['REQUEST_URI']);
    header("Location: ../accounts/login?redirect=$url");
    exit();
}

function try_login($username, $password) {
    $user = get_user_by_username($username);

    if (password_verify($password, $user['password_hash'])) {
        $_SESSION['user_id'] = $user['id'];
        return true;
    } else {
        return false;
    }
}

function logout() {
    unset($_SESSION['user_id']);
}