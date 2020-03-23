<?php
$db_host = 'mysql';
$db_name = 'benjamindavies_maquo';
$db_username = 'benjamindavies';
$db_password = 'secret';

$secrets_file = __DIR__.'/../../secret.php';
if (file_exists($secrets_file)) {
    require $secrets_file;
}

try {
    $db = new PDO(
        "mysql:host=$db_host;" .
        "dbname=$db_name",
        $db_username, $db_password);
} catch (PDOException $e) {
    http_response_code(500);
    header('Content-Type: text/plain');
    echo "Failed to connect to db\n";
    echo $e;
    exit();
}
