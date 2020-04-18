<?php
require 'util/search.php';

$root_url = '.';
$page_title = 'Search';
?>
<?php include 'util/components/begin.php'; ?>

<header class="Header MainColumn">
    <form class="ColumnForm ColumnForm--row">
        <input type="text" name="q" placeholder="Search Here..." autofocus required>
        <button type="submit">Search</button>
    </form>
</header>

<main class="MainColumn">
<?php
if (isset($_GET['q'])) {
    $query = $_GET['q'];

    $quizzes = search_quizzes($query);

    if (count($quizzes) > 0) {
        foreach ($quizzes as $quiz) {
?>
    <section class="Card">
        <h1>
            <?=$quiz['name']?>
            <span class="small">By <?=$quiz['author']?></span>
        </h1>
        <p><?=$quiz['description']?></p>
        <p class="Card__action"><a href="quiz#<?=$quiz['id']?>" class="button button--secondary">Take The Quiz</a></p>
    </section>
<?php
        }
    } else {
        echo '<h1>No results found.</h1>';
    }
} else {
    echo '<h1>Please enter a search query.</h1>';
}
?>
</main>

<?php include 'util/components/end.php'; ?>
