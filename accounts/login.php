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
$google_platform = true;
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
        <p>
            <div id="google-signin"></div>
        </p>
    </div>
</main>

<script>
async function on_success(user) {
  const id_token = user.getAuthResponse().id_token;

  const body = new FormData();
  body.append('idtoken', id_token);

  const res = await fetch('g-login', { method: 'POST', body });
  if (!res.ok) throw 'Error in g-login';

  const text = await res.text();

  switch (text) {
    case 'success':
      const url_params = new URLSearchParams(location.search);
      const redirect = url_params.get('redirect');
      location.replace(redirect);
      break;
    case 'signup':
      location.replace(`g-signup${location.search}`);
      break;
    default:
      throw text;
  }
}
function on_failure(error) {
  console.log(error);
}
function on_load() {
  gapi.signin2.render('google-signin', {
    'scope': 'profile email',
    'longtitle': true,
    'theme': 'dark',
    'onsuccess': on_success,
    'onfailure': on_failure
  });
}
</script>

<?php
require('../util/components/end.php')
?>
