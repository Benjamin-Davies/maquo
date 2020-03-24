<?php
require '../util/db/users.php';
require '../util/db/questions.php';
require '../util/db/quizzes.php';

$id = $_GET['id'];
$quiz = get_quiz($id);
$quiz['questions'] = get_questions_by_quiz_id($id);
$quiz['author'] = get_user($quiz['author_id'])['username'];
echo json_encode($quiz);
