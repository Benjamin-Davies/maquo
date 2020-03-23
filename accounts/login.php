<?php
$no_redirect_login = true;

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

<main class="MainColumn MainColumn--double">
    <form method="POST" class="ColumnForm">
        <h1>Login</h1>
        <label for="username">Username:</label>
        <input type="text" name="username" id="username">
        <label for="password">Password:</label>
        <input type="password" name="password" id="password">
        <input type="hidden" name="redirect" value="<?=
            $_GET['redirect']
        ?>">
        <button type="submit">Login</button>
        <?php if (isset($error)) { ?>
            <p class="error"><?= $error ?></p>
        <?php } ?>
    </form>
    <div class="Card">
        <h3>Or you can...</h3>
        <p>
            <a href="register" class="button">Register</a>
        </p>
    </div>
</main>

<?php
require('../util/components/end.php')
?>
