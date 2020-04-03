<?php
require '../util/db/users.php';
require '../util/db/questions.php';
require '../util/db/quizzes.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  require '../util/auth.php';

  $id = $_POST['id'];
  $question = $_POST['question'];
  $answer = $_POST['answer'];
  $number = $_POST['number'];

  $q = get_question($id);
  $quiz = get_quiz($q['quiz_id']);
  if ($quiz['author_id'] !== $user_id) {
    throw new Exception('You do not own that quiz');
  }

  update_question($id, $question, $answer, $number);
}
