<?php
$no_redirect_login = true;

require_once('../util/connect.php');
require_once('../util/auth.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $success = try_login($_POST['username'], $_POST['password']);

    if ($success) {
        $redirect = $_POST['redirect'];
        header("Location: $redirect");
        exit();
    } else {
        $error = 'Wrong username or password';
    }
}

$root_url = '..';
$page_title = 'Login';
require('../util/components/begin.php');
?>

<main class="MainColumn">
    <form action="login" method="POST" class="ColumnForm">
        <h1>Login</h1>
        <?php if (isset($error)) { ?>
            <span><?= $error ?></span>
        <?php } ?>
        <input type="text" name="username">
        <input type="password" name="password">
        <input type="hidden" name="redirect" value="<?=
            $_GET['redirect']
        ?>">
        <button type="submit">Login</button>
    </form>
</main>

<?php
require('../util/components/end.php')
?>