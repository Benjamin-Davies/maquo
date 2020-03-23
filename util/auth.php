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

function login($username, $password) {
    $user = get_user_by_username($username);

    if (!password_verify($password, $user['password_hash'])) {
        throw new Exception('Wrong username or password');
    }

    $_SESSION['user_id'] = $user['id'];
}

function register($email, $username, $password, $confirm_password) {
    $existing_user = get_user_by_username($username);

    if ($password !== $confirm_password) {
      throw new Exception('Passwords must match');
    }

    if (isset($existing_user['id'])) {
      throw new Exception('Username is already in use');
    }

    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    $id = create_user($email, $username, $password_hash);
    $_SESSION['user_id'] = $id;
}

function logout() {
    unset($_SESSION['user_id']);
}
