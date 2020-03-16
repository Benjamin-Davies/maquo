<?php
$no_redirect_login = true;

require_once('../util/connect.php');
require_once('../util/auth.php');

$root_url = '..';
$page_title = 'Login';
require('../util/components/begin.php');
?>

<main class="MainColumn">
    <h1>Login</h1>
    <?= $_GET["redirect"] ?>
    <?= password_hash('test', PASSWORD_DEFAULT) ?>
</main>

<?php
require('../util/components/end.php')
?>