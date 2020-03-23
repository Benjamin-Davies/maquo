<?php
require_once __DIR__.'/connect.php';

function get_user_by_username($username) {
    global $db;

    $sql = 'SELECT * FROM users WHERE username = :username';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':username', $username);
    $success = $stmt->execute();
    if (!$success) {
        throw new Exception('Failed to get user details');
    }
    return $stmt->fetch();
}

function create_user($email, $username, $password_hash) {
    global $db;

    $sql = 'INSERT INTO `users` (`id`, `email`, `username`, `password_hash`)
            VALUES (NULL, :email, :username, :password_hash)';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':username', $username);
    $stmt->bindValue(':password_hash', $password_hash);
    $success = $stmt->execute();
    if (!$success) {
        throw new Exception('Failed to create user');
    }
    return $db->lastInsertId();
}
