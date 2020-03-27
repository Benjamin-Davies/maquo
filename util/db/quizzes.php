<?php
require_once __DIR__.'/connect.php';

function get_quiz($id) {
    global $db;

    $sql = 'SELECT * FROM quizzes WHERE id = :id';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':id', $id);
    $success = $stmt->execute();
    if (!$success) {
        throw new Exception('Failed to get quiz details');
    }
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function get_quizzes() {
    global $db;

    $sql = 'SELECT * FROM quizzes';
    $stmt = $db->prepare($sql);
    $success = $stmt->execute();
    if (!$success) {
        throw new Exception('Failed to get quizzes');
    }
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
