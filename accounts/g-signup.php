<?php
$no_redirect_login = true;

require_once('../util/auth.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        signup_with_google($_POST['username']);

        $redirect = $_POST['redirect'];
        header("Location: $redirect");
        exit();
    } catch (Exception $e) {
        $error = $e->getMessage();
    }
}

$root_url = '..';
$page_title = 'Sign Up With Google';
require('../util/components/begin.php');
?>

<main class="MainColumn">
    <form method="POST" class="ColumnForm">
        <h1>Sign Up With Google</h1>
        <p>There's just one more step left in signing you up! We need to know what you want your username to be.</p>
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" autofocus autocomplete="username">
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
