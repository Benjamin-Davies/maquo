<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="An amazing quiz site for children and adults alike.">
    <title><?=$page_title?> - Maquo</title>
    <link rel="icon" href="<?=$root_url?>/assets/icon.png">
    <link rel="stylesheet" href="<?=$root_url?>/style.css">
    <link async rel="stylesheet" href="https://unpkg.com/typicons.font@2.0.9/src/font/typicons.css">
<?php
if (isset($google_platform)) {
    require __DIR__.'/../oauth.php';
?>
    <script src="https://apis.google.com/js/platform.js?onload=on_load" async defer></script>
    <meta name="google-signin-client_id" content="<?=$oauth->web->client_id?>">
<?php
}

if (isset($links)) {
    foreach ($links as $link) {
?>
    <link
<?php
        foreach ($link as $k => $v) {
            echo "$k=\"$v\"";
        }
?>
    >
<?php
    }
}
?>
</head>
<body>
    <noscript>
        <header class="MainColumn">
            <h3>Hello user</h3>
            <p>
                We agree that the web was much simpler in the old days, and that some people might have prefered that.
                However, <b>Maquo requires Javascript</b> in order to function properly, so we ask that you enable Javascript on this site.
            </p>
            <p>
                Thank you.
            </p>
        </header>
    </noscript>
    <script nomodule>
        alert('Your browser does not appear to support any of the new features that Maquo makes use of.\nPlease consider using a recent version of Google Chrome or Firefox.');
    </script>
    <nav class="Nav Nav--large">
        <ul class="Nav__inner">
            <li>
                <a class="Nav__logo" href="<?=$root_url?>/">Maquo</a>
            </li>
            <li class="Nav__spacer"></li>
            <li>
                <a class="Nav__link Nav__link--home" href="<?=$root_url?>/">Home</a>
            </li>
            <li>
                <a class="Nav__link Nav__link--search" href="<?=$root_url?>/search">Search</a>
            </li>
            <li>
                <a class="Nav__link Nav__link--create" href="<?=$root_url?>/create">Create</a>
            </li>
            <li>
                <a class="Nav__link Nav__link--account" href="<?=$root_url?>/accounts/my-account">My Account</a>
            </li>
            <?php if (isset($user_id)) { ?>
                <li>
                    <a class="Nav__link Nav__link--logout" href="<?=$root_url?>/accounts/logout">Log Out</a>
                </li>
            <?php } ?>
        </ul>
    </nav>
    <main>
