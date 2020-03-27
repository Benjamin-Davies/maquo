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

function login_with_google($token) {
  require __DIR__.'/oauth.php';

  $tokeninfo = get_tokeninfo($token);

  if ($tokeninfo->aud !== $oauth->web->client_id) {
    throw new Exception('Token audience does not match our client_id');
  }

  $google_id = $tokeninfo->sub;
  $user = get_user_by_google_id($google_id);

  if ($user) {
    $_SESSION['user_id'] = $user['id'];
    return 'success';
  } else {
    $_SESSION['g-signup-google_id'] = $google_id;
    $_SESSION['g-signup-email'] = $tokeninfo->email;
    return 'signup';
  }
}

function get_tokeninfo($token) {
    $url = 'https://oauth2.googleapis.com/tokeninfo?id_token='.$token;
    $res = file_get_contents($url);
    return json_decode($res);
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
    $id = create_user($email, $username, $password_hash, '');
    $_SESSION['user_id'] = $id;
}

function signup_with_google($username) {
    $existing_user = get_user_by_username($username);
    if (isset($existing_user['id'])) {
        throw new Exception('Username is already in use');
    }

    $google_id = $_SESSION['g-signup-google_id'];
    $email = $_SESSION['g-signup-email'];
    $id = create_user($email, $username, '', $google_id);
    $_SESSION['user_id'] = $id;

    unset($_SESSION['g-signup-google_id']);
    unset($_SESSION['g-signup-email']);
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
