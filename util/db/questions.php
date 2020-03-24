<?php
require_once __DIR__.'/connect.php';

function get_questions_by_quiz_id($quiz_id) {
    global $db;

    $sql = 'SELECT * FROM questions
            WHERE quiz_id = :quiz_id
            ORDER BY number ASC';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':quiz_id', $quiz_id);
    $success = $stmt->execute();
    if (!$success) {
        throw new Exception('Failed to get questions');
    }
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
