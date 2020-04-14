<?php
require_once __DIR__.'/connect.php';

function create_quiz($author_id) {
    global $db;

    $sql = 'INSERT INTO `quizzes` (`id`, `name`, `description`, `author_id`)
            VALUES (NULL, "", "", :author_id)';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':author_id', $author_id);
    $success = $stmt->execute();
    if (!$success) {
        throw new Exception('Failed to create quiz');
    }
    return $db->lastInsertId();
}

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

    $sql = 'SELECT * FROM quizzes WHERE published = 1 ORDER BY id DESC';
    $stmt = $db->prepare($sql);
    $success = $stmt->execute();
    if (!$success) {
        throw new Exception('Failed to get quizzes');
    }
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function get_quizzes_by_user($author_id) {
    global $db;

    $sql = 'SELECT * FROM quizzes
        WHERE author_id = :author_id
        ORDER BY id DESC';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':author_id', $author_id);
    $success = $stmt->execute();
    if (!$success) {
        throw new Exception('Failed to get quizzes');
    }
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function update_quiz_details($id, $name, $description, $published) {
    global $db;

    $name = prepare_name($name);
    $description = prepare_description($description);

    $sql = 'UPDATE `quizzes`
            SET name = :name, description = :description, published = :published
            WHERE id = :id';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':id', $id);
    $stmt->bindValue(':name', $name);
    $stmt->bindValue(':description', $description);
    $stmt->bindValue(':published', $published);
    $success = $stmt->execute();
    if (!$success) {
        throw new Exception('Failed to update quiz');
    }
}

function delete_quiz($id) {
    global $db;

    $sql = 'DELETE FROM `quizzes`
            WHERE id = :id';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':id', $id);
    $success = $stmt->execute();
    if (!$success) {
        throw new Exception('Failed to delete quiz');
    }
}

function prepare_name($name) {
    $name = trim($name);

    if (strlen($name) > 20) {
        return new Error('Name is too long');
    }

    return $name;
}

function prepare_description($description) {
    $description = trim($description);

    if (strlen($description) > 100) {
        return new Error('Description is too long');
    }

    return $description;
}
