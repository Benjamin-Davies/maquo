<?php
require_once __DIR__.'/connect.php';

function get_user_by_username($username) {
    global $db;

    $sql = 'SELECT * FROM users WHERE username = :username';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':username', $username);
    $stmt->execute();
    return $stmt->fetch();
}