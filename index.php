<?php 
$root_url = '.';
$page_title = 'Welcome';
?>
<?php include 'util/components/begin.php'; ?>

<header class="Header MainColumn">
    <h1>Welcome to Maquo</h1>
    <p>
        <a href="create/" class="button">Create Quiz</a>
    </p>
</header>

<main class="MainColumn">
<?php for ($i = 0; $i < 5; $i++) { ?>
    <section class="Card">
        <h1>A<?php for ($j = 0; $j < $i; $j++) { echo 'nother'; } ?> Quizz</h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae, ut?</p>
        <p class="Card__action"><a href="quiz#123456" class="button button--secondary">Take The Quiz</a></p>
    </section>
<?php } ?>
</main>

<?php include 'util/components/end.php'; ?>