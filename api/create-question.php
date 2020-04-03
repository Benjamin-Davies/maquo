<?php
require '../util/db/users.php';
require '../util/db/questions.php';
require '../util/db/quizzes.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  require '../util/auth.php';

  $quiz_id = $_GET['quiz_id'];

  $quiz = get_quiz($quiz_id);
  if ($quiz['author_id'] !== $user_id) {
    throw new Exception('You do not own that quiz');
  }

  $question = create_question($quiz_id);

  echo json_encode($question);
}
