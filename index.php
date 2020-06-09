<?php
require 'util/db/quizzes.php';
require 'util/db/users.php';

$root_url = '.';
$page_title = 'Welcome';
?>
<?php include 'util/components/begin.php'; ?>

<header class="Header MainColumn">
    <h1>Welcome to Maquo</h1>
    <p class="blurb">&hellip;the site for Ma Quizzes</p>
    <p class="blurb">To get started you will be asked to create an account. Then you can create your first quizz. Or you could try someone else's quiz.</p>
    <p>
        <a href="create/" class="button">Create Quiz</a>
    </p>
</header>

<main class="MainColumn">
<?php foreach (get_quizzes() as $quiz) { ?>
    <section class="Card">
        <h1>
            <?=htmlspecialchars($quiz['name'])?>
            <span class="small">By <?=htmlspecialchars(
              get_user($quiz['author_id'])['username']
            )?></span>
        </h1>
        <p><?=htmlspecialchars($quiz['description'])?></p>
        <p class="Card__action"><a href="quiz#<?=$quiz['id']?>" class="button button--secondary">Take The Quiz</a></p>
    </section>
<?php } ?>
</main>

<?php include 'util/components/end.php'; ?>
