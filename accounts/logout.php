<?php
$no_redirect_login = true;

require_once('../util/auth.php');

logout();

header("Location: ../");