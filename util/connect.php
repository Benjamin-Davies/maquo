<?php
$db_name = 'benjamindavies_maquo';
$db_username = 'benjamindavies';
$db_password = 'secret';

if (file_exists('../secret.php')) {
    require('../secret.php');
}

try {
    $db = new PDO(
        "mysql:host=localhost;" .
        "dbname=$db_name",
        $db_username, $db_password);
} catch (PDOException $e) {
    http_response_code(500);
    header('Content-Type: text/plain');
    echo "Failed to connect to db\n";
    //echo $e;
    exit();
}
?>