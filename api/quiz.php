<?php
require '../util/db/users.php';
require '../util/db/questions.php';
require '../util/db/quizzes.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  $id = $_GET['id'];
  $quiz = get_quiz($id);
  $quiz['questions'] = get_questions_by_quiz_id($id);
  $quiz['author'] = get_user($quiz['author_id'])['username'];
  echo json_encode($quiz);
} else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  require '../util/auth.php';

  $id = $_POST['id'];
  $name = $_POST['name'];
  $description = $_POST['description'];
  $published = $_POST['published'];

  $quiz = get_quiz($id);
  if ($quiz['author_id'] !== $user_id) {
    throw new Exception('You do not own that quiz');
  }

  update_quiz_details($id, $name, $description, $published);
}
