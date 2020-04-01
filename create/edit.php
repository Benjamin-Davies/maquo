<?php
require_once('../util/auth.php');
require_once('../util/db/quizzes.php');

$root_url = '..';
$page_title = 'Edit Quiz';
$links = [
    [
        'rel' => 'preload',
        'as' => 'script',
        'href' => '../lib/react.production.min.js',
    ],
    [
        'rel' => 'preload',
        'as' => 'script',
        'href' => '../lib/react-dom.production.min.js',
    ],
    [
        'rel' => 'preload',
        'as' => 'modulescript',
        'href' => 'src/Edit.js',
    ],
];
require('../util/components/begin.php');
?>

<main class="MainColumn" id="root">
    <h1 class="center">Loading...</h1>
</main>

<script src="../lib/react.production.min.js"></script>
<script src="../lib/react-dom.production.min.js"></script>
<script type="module" src="src/Edit.js"></script>

<?php
require('../util/components/end.php');
?>
