<?php
require_once __DIR__.'/connect.php';

function get_question($id) {
    global $db;

    $sql = 'SELECT * FROM questions
            WHERE id = :id';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':id', $id);
    $success = $stmt->execute();
    if (!$success) {
        throw new Exception('Failed to get questions');
    }
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

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

function update_question($id, $question, $answer, $number) {
    global $db;

    $sql = 'UPDATE `questions`
            SET question = :question, answer = :answer, number = :number
            WHERE id = :id';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':id', $id);
    $stmt->bindValue(':question', $question);
    $stmt->bindValue(':answer', $answer);
    $stmt->bindValue(':number', $number);
    $success = $stmt->execute();
    if (!$success) {
        throw new Exception('Failed to update question');
    }
}

function delete_question($id) {
    global $db;

    $sql = 'DELETE FROM `questions`
            WHERE id = :id';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':id', $id);
    $success = $stmt->execute();
    if (!$success) {
        throw new Exception('Failed to delete question');
    }
}
