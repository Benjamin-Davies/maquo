<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$page_title?> - Maquo</title>
    <link rel="icon" href="<?=$root_url?>/assets/icon.png">
    <link rel="stylesheet" href="<?=$root_url?>/style.css">
<?php
if (isset($google_platform_library)) {
    require __DIR__.'/../oauth.php';
?>
    <script src="https://apis.google.com/js/platform.js<?php
    if (isset($google_platform_library_onload)) {
        echo '?onload='.$google_platform_library_onload;
    }
?>" async defer></script>
    <meta name="google-signin-client_id" content="<?=$oauth->web->client_id?>">
<?php
}
?>
</head>
<body>
    <nav class="Nav Nav--large">
        <ul class="Nav__inner">
            <li>
                <a class="Nav__logo" href="<?=$root_url?>/">Maquo</a>
            </li>
            <li class="Nav__spacer"></li>
            <li>
                <a class="Nav__link" href="<?=$root_url?>/create">Create Quiz</a>
            </li>
            <li>
                <a class="Nav__link" href="<?=$root_url?>/accounts/my-account">My Account</a>
            </li>
            <?php if (isset($user_id)) { ?>
                <li>
                    <a class="Nav__link" href="<?=$root_url?>/accounts/logout">Log Out</a>
                </li>
            <?php } ?>
        </ul>
    </nav>
    <main>
