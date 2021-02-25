<?php
$db_type = 'mysql';
$db_host = 'mysql';
$db_name = 'benjamindavies_maquo';
$db_username = 'benjamindavies';
$db_password = 'secret';

$secrets_file = __DIR__.'/../../secret.php';
if (file_exists($secrets_file)) {
    require $secrets_file;
}

if (getenv('DATABASE_URL')) {
    $db_url = getenv('DATABASE_URL');
    $db_url_matched = preg_match(
        '/postgres:\/\/(.*):(.*)@(.*):(.*)\/(.*)/',
        $db_url,
        $db_url_matches,
    );

    if ($db_url_matched) {
        $db_type = 'pgsql';
        $db_username = $db_url_matches[1];
        $db_password = $db_url_matches[2];
        $db_host = $db_url_matches[3];
        $db_name = $db_url_matches[5];
    }
}

try {
    $db = new PDO(
        "$db_type:host=$db_host;" .
        "dbname=$db_name",
        $db_username, $db_password);
} catch (PDOException $e) {
    http_response_code(500);
    header('Content-Type: text/plain');
    echo "Failed to connect to db\n";
    echo $e;
    exit();
}
