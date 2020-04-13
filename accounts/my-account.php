<?php
require_once('../util/auth.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if ($_POST['update'] === 'details') {
      try {
          update_user_details($user_id,
              $_POST['email'], $_POST['username']);
          $message = 'Successfully updated user details';
      } catch (Exception $e) {
          $message = $e->getMessage();
      }
  }

  if ($_POST['update'] === 'password') {
      try {
          change_password(
              $_POST['old_password'],
              $_POST['new_password'],
              $_POST['confirm_password']);
          $message = 'Successfully changed password';
      } catch (Exception $e) {
          $message = $e->getMessage();
      }
  }

  if ($_POST['update'] === 'delete_account') {
      $delete_account = true;
  }
}

$user = get_user($user_id);

$root_url = '..';
$page_title = 'My Account';
include '../util/components/begin.php';
?>

<main class="MainColumn">
    <h1>My Account</h1>
    <section>
        <form class="ColumnForm" method="POST">
            <label for="email">Email:</label>
            <input
                type="email"
                name="email"
                id="email"
                value="<?= $user['email'] ?>">
            <label for="username">Username:</label>
            <input
                type="text"
                name="username"
                id="username"
                value="<?= $user['username'] ?>">
            <input type="hidden" name="update" value="details">
            <button type="submit">Update Details</button>
        </form>
    </section>
    <section>
        <form class="ColumnForm" method="POST">
            <label for="old_password">Old Password:</label>
            <input type="password" name="old_password" id="old_password" autocomplete="current-password">
            <label for="new_password">New Password:</label>
            <input type="password" name="new_password" id="new_password" autocomplete="new-password">
            <label for="confirm_password">Confirm Password:</label>
            <input type="password" name="confirm_password" id="confirm_password" autocomplete="new-password">
            <input type="hidden" autocomplete="username" value="<?= $user['username'] ?>">
            <input type="hidden" name="update" value="password">
            <button type="submit">Change Password</button>
        </form>
    </section>
    <section>
        <form class="ColumnForm" method="POST">
            <input type="hidden" name="update" value="delete_account">
            <button type="submit">Delete Account</button>
        </form>
    </section>
</main>

<?php
if (isset($message)) {
?>
<script>
    alert('<?=$message?>');
</script>
<?php
} elseif (isset($delete_account)) {
?>
<script>
    if (confirm('Are you sure that you want to delete your account?')) {
        location.href = 'logout?delete';
    }
</script>
<?php
}
?>

<?php include '../util/components/end.php'; ?>
