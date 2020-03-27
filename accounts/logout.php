<?php
$no_redirect_login = true;

require_once('../util/auth.php');

$google_id = logout();

if (!$google_id) {
    header("Location: ../");
    exit();
}

$root_url = '..';
$page_title = 'Log Out';
$google_platform = true;
require('../util/components/begin.php');
?>

<main class="MainColumn">
    <h1>Log Out</h1>
    <p>Please wait while we log you out...</p>
</main>

<script>
async function on_success() {
  await gapi.client.init({});
  await gapi.auth2.init({});

  const auth2 = gapi.auth2.getAuthInstance();
  await auth2.signOut();

  location.replace('..');
}

function on_load() {
  gapi.load('client:auth2', on_success);
}
</script>

<?php
require '../util/components/end.php';
?>
