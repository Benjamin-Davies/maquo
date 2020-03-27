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

function signup($email, $username, $password, $confirm_password) {
    if ($password !== $confirm_password) {
        throw new Exception('Passwords must match');
    }

    $existing_user = get_user_by_username($username);
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

function change_password($old_password, $new_password, $confirm_password) {
    global $user_id;

    if ($new_password !== $confirm_password) {
        throw new Exception('Passwords must match');
    }

    $user = get_user($user_id);
    if (!password_verify($old_password, $user['password_hash'])) {
        throw new Exception('Wrong password');
    }

    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
    update_user_password_hash($user_id, $password_hash);
}

function delete_account() {
    global $user_id;

    delete_user($user_id);

    logout();
}
