<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title;?> - Maquo</title>
    <link rel="stylesheet" href="<?=$root_url?>/style.css">
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
            <?php if (isset($user_id)) { ?>
                <li>
                    <a class="Nav__link" href="<?=$root_url?>/accounts/logout">Logout</a>
                </li>
            <?php } ?>
        </ul>
    </nav>
    <main>
    