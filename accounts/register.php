<?php
$no_redirect_login = true;

require_once('../util/auth.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        register(
            $_POST['email'],
            $_POST['username'],
            $_POST['password'],
            $_POST['confirm_password']);

        $redirect = $_POST['redirect'];
        header("Location: $redirect");
        exit();
    } catch (Exception $e) {
        $error = $e->getMessage();
    }
}

$root_url = '..';
$page_title = 'Register';
require('../util/components/begin.php');
?>

<main class="MainColumn">
    <form method="POST" class="ColumnForm">
        <h1>Register</h1>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username">
        <label for="password">Password:</label>
        <input type="password" name="password" id="password">
        <label for="confirm_password">Confirm Password:</label>
        <input type="password" name="confirm_password" id="confirm_password">
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
