<?php
require_once '../util/auth.php';
require_once '../util/db/quizzes.php';

$quiz_id = create_quiz($user_id);

header("Location: edit?id=$quiz_id");
