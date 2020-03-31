<?php
require_once('../util/auth.php');
require_once('../util/db/quizzes.php');

$quiz_id = $_GET['id'];
$quiz = get_quiz($quiz_id);
print_r([$quiz_id, $quiz]);

if ($user_id !== $quiz['author_id']) {
    throw new Exception('You do not own that quiz!');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        update_quiz_details($quiz_id, $_POST['name'], $_POST['description']);

        $quiz = get_quiz($quiz_id);
    } catch (Exception $e) {
        $error = $e->getMessage();
    }
}

$root_url = '..';
$page_title = 'Edit Quiz';
require('../util/components/begin.php');
?>

<main class="MainColumn">
    <h1>Edit Quiz</h1>
    <form method="POST" class="ColumnForm">
        <label for="name">Title:</label>
        <input name="name" id="name" value="<?=$quiz['name']?>">
        <label for="description">Description:</label>
        <input name="description" id="description" value="<?=$quiz['description']?>">
        <button type="submit">Save</button>
        <?php if (isset($error)) { ?>
            <p class="error"><?= $error ?></p>
        <?php } ?>
    </form>
</main>

<?php
require('../util/components/end.php');
?>
