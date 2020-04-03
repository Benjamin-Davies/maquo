<?php
require '../util/db/users.php';
require '../util/db/questions.php';
require '../util/db/quizzes.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  require '../util/auth.php';

  $id = $_POST['id'];

  $quiz = get_quiz($id);
  if ($quiz['author_id'] !== $user_id) {
    throw new Exception('You do not own that quiz');
  }

  foreach (get_questions_by_quiz_id($id) as $q) {
    delete_question($q['id']);
  }

  delete_quiz($id);
}
