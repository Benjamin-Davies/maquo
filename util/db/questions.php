<?php
require_once __DIR__.'/connect.php';

function create_question($quiz_id) {
    global $db;

    $number = get_next_question_number($quiz_id);

    $sql = 'INSERT INTO `questions` (`quiz_id`, `question`, `answer`, `number`)
            VALUES (:quiz_id, "", "", :number)';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':quiz_id', $quiz_id);
    $stmt->bindValue(':number', $number);
    $success = $stmt->execute();
    if (!$success) {
        throw new Exception('Failed to create question');
    }
    $id = $db->lastInsertId();

    return get_question($id);
}

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

function get_next_question_number($quiz_id) {
    global $db;

    $sql = 'SELECT MAX(`number`) as `max_n` FROM questions
            WHERE quiz_id = :quiz_id';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':quiz_id', $quiz_id);
    $success = $stmt->execute();
    if (!$success) {
        throw new Exception('Failed to get question');
    }
    return $stmt->fetch(PDO::FETCH_ASSOC)['max_n'] + 1;
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

    $question = prepare_question($question);
    $answer = prepare_answer($answer);

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

function prepare_question($question) {
    $question = trim($question);

    if (strlen($question) > 60) {
        throw new Exception('Value is too long');
    }

    return $question;
}

function prepare_answer($answer) {
    $answer = trim($answer);

    if (strlen($answer) > 20) {
        throw new Exception('Value is too long');
    }

    return $answer;
}
