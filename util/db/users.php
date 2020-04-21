<?php
require_once __DIR__.'/connect.php';

function create_user($email, $username, $password_hash, $google_id) {
    global $db;

    $email = prepare_email($email);
    $username = prepare_username($username);

    $sql = 'INSERT INTO `users` (`id`, `email`, `username`, `password_hash`, `google_id`)
            VALUES (NULL, :email, :username, :password_hash, :google_id)';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':username', $username);
    $stmt->bindValue(':password_hash', $password_hash);
    $stmt->bindValue(':google_id', $google_id);
    $success = $stmt->execute();
    if (!$success) {
        throw new Exception('Failed to create user');
    }
    return $db->lastInsertId();
}

function get_user($id) {
    global $db;

    $sql = 'SELECT * FROM users WHERE id = :id';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':id', $id);
    $success = $stmt->execute();
    if (!$success) {
        throw new Exception('Failed to get user details');
    }
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function get_user_by_username($username) {
    global $db;

    $sql = 'SELECT * FROM users WHERE username = :username';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':username', $username);
    $success = $stmt->execute();
    if (!$success) {
        throw new Exception('Failed to get user details');
    }
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function get_user_by_google_id($google_id) {
    global $db;

    $sql = 'SELECT * FROM users WHERE google_id = :google_id';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':google_id', $google_id);
    $success = $stmt->execute();
    if (!$success) {
        throw new Exception('Failed to get user details');
    }
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function update_user_details($id, $email, $username) {
    global $db;

    $email = prepare_email($email);
    $username = prepare_username($username);

    $sql = 'UPDATE `users`
            SET email = :email, username = :username
            WHERE id = :id';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':id', $id);
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':username', $username);
    $success = $stmt->execute();
    if (!$success) {
        throw new Exception('Failed to update details');
    }
}

function update_user_password_hash($id, $password_hash) {
    global $db;

    validate_password($password);

    $sql = 'UPDATE `users`
            SET password_hash = :password_hash
            WHERE id = :id';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':id', $id);
    $stmt->bindValue(':password_hash', $password_hash);
    $success = $stmt->execute();
    if (!$success) {
        throw new Exception('Failed to update password');
    }
}

function delete_user($id) {
    global $db;

    $sql = 'DELETE FROM `users` WHERE id = :id';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':id', $id);
    $success = $stmt->execute();
    if (!$success) {
        throw new Exception('Failed to delete user');
    }
}

function prepare_email($email) {
    $email = trim($email);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        throw new Exception('Invalid email');
    }
    if (strlen($email) > 320) {
        throw new Exception('Email is too long');
    }

    return $email;
}

function prepare_username($username) {
    $username = trim($username);

    if (strlen($username) < 3) {
        throw new Exception('Username is too short');
    }
    if (strlen($username) > 20) {
        throw new Exception('Username is too long');
    }

    return $username;
}
