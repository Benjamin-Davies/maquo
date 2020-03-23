<?php
$no_redirect_login = true;

require_once('../util/auth.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $success = try_register($_POST['username'], $_POST['password']);

    if ($success) {
        $redirect = $_POST['redirect'];
        header("Location: $redirect");
        exit();
    } else {
        $error = 'Bad person, there should be an error here.';
    }
}

$root_url = '..';
$page_title = 'Register';
require('../util/components/begin.php');
?>

<main class="MainColumn">
    <form method="POST" class="ColumnForm">
        <h1>Register</h1>
        <label for="username">Username:</label>
        <input type="text" name="username" id="username">
        <label for="password">Password:</label>
        <input type="password" name="password" id="password">
        <input type="hidden" name="redirect" value="<?=
            $_GET['redirect']
        ?>">
        <button type="submit">Register</button>
        <?php if (isset($error)) { ?>
            <p class="error"><?= $error ?></p>
        <?php } ?>
    </form>
</main>

<?php
require('../util/components/end.php')
?>
