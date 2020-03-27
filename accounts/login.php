<?php
$no_redirect_login = true;

require_once('../util/auth.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        login($_POST['username'], $_POST['password']);

        $redirect = $_POST['redirect'];
        header("Location: $redirect");
        exit();
    } catch (Exception $e) {
        $error = $e->getMessage();
    }
}

$root_url = '..';
$page_title = 'Log In';
require('../util/components/begin.php');
?>

<main class="MainColumn MainColumn--double">
    <form method="POST" class="ColumnForm">
        <h1>Log In</h1>
        <label for="username">Username:</label>
        <input type="text" name="username" id="username">
        <label for="password">Password:</label>
        <input type="password" name="password" id="password">
        <input type="hidden" name="redirect" value="<?=
            $_GET['redirect']
        ?>">
        <button type="submit">Log In</button>
        <?php if (isset($error)) { ?>
            <p class="error"><?= $error ?></p>
        <?php } ?>
    </form>
    <div class="Card">
        <h3>Or you can...</h3>
        <p>
          <a href="signup?redirect=<?=
              urlencode($_GET['redirect'])
          ?>" class="button">Sign Up</a>
        </p>
    </div>
</main>

<?php
require('../util/components/end.php')
?>
