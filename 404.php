<?php
require 'util/db/quizzes.php';
require 'util/db/users.php';

$root_url = '/.';
$page_title = '404';
?>
<?php include 'util/components/begin.php'; ?>

<header class="Header MainColumn">
    <h1>Oops!</h1>
    <p class="blurb">Sorry, but that page does not exist...</p>
    <p>
        <a href="/" class="button">Return to Home</a>
    </p>
</header>

<?php include 'util/components/end.php'; ?>
