<?php
$no_redirect_login = true;

require_once('../util/auth.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        signup(
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
$page_title = 'Sign Up';
require('../util/components/begin.php');
?>

<main class="MainColumn">
    <form method="POST" class="ColumnForm">
        <h1>Sign Up</h1>
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" autocomplete="username">
        <label for="email">Email:</label>
        <input type="text" name="email" id="email">
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" autocomplete="new-password">
        <label for="confirm_password">Confirm Password:</label>
        <input type="password" name="confirm_password" id="confirm_password" autocomplete="new-password">
        <input type="hidden" name="redirect" value="<?=
            $_GET['redirect']
        ?>">
        <button type="submit">Sign Up</button>
        <?php if (isset($error)) { ?>
            <p class="error"><?= $error ?></p>
        <?php } ?>
    </form>
</main>

<?php
require('../util/components/end.php')
?>
