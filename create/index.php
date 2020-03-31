<?php
require_once('../util/auth.php');
require_once('../util/db/quizzes.php');

$user_quizzes = get_quizzes_by_user($user_id);

$root_url = '..';
$page_title = 'My Quizzes';
require('../util/components/begin.php');
?>

<header class="Header MainColumn">
    <h1>My Quizzes</h1>
    <p>
        <a class="button" href="new">New Quiz</a>
    </p>
</header>

<main class="MainColumn">
<?php
if (empty($user_quizzes)) {
?>
<h1 class="center">You do not currently have any quizzes</h1>
<?php
} else {
    foreach ($user_quizzes as $quiz) {
?>
    <section class="Card">
        <h1><?=$quiz['name']?></h1>
        <p><?=$quiz['description']?></p>
        <p class="Card__action">
            <a href="edit?id=<?=$quiz['id']?>"
                class="button">Edit Quiz</a>
            <a href="../quiz#<?=$quiz['id']?>"
                class="button button--secondary">Take The Quiz</a>
        </p>
    </section>
<?php
    }
}
?>
</main>

<?php
require('../util/components/end.php');
?>
