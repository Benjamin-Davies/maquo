<?php
require_once __DIR__.'/connect.php';

function create_user($email, $username, $password_hash, $google_id) {
    global $db;

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
