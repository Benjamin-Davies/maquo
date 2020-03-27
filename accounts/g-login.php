<?php
$no_redirect_login = true;
require '../util/auth.php';

echo login_with_google($_POST['idtoken']);
