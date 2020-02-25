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
    <section class="Card">
        <h1>A Quizz</h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae, ut?</p>
        <p class="Card__action"><a href="quiz#123456" class="button button--secondary">Take The Quiz</a></p>
    </section>
    <section class="Card">
        <h1>Another Quizz</h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae, ut?</p>
        <p class="Card__action"><a href="quiz#123456" class="button button--secondary">Take The Quiz</a></p>
    </section>
    <section class="Card">
        <h1>Yet Another Quizz</h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae, ut?</p>
        <p class="Card__action"><a href="quiz#123456" class="button button--secondary">Take The Quiz</a></p>
    </section>
</main>

<?php include 'util/components/end.php'; ?>