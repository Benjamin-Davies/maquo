<?php
$no_redirect_login = true;

require_once('../util/auth.php');

delete_account();

header("Location: ../");
