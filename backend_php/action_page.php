<?php
$dsn = 'mysql:dbname=fyp;host=192.168.140.100;charset=UTF8';
$dbuser = 'www-data';
$dbpwd = '';

function dbconnect() {
    try {
        global $dsn, $dbuser, $dbpwd;
        $pdo = new PDO($dsn, $dbuser, $dbpwd);
        $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        die('Database Error');
    }
}

$pdo = dbconnect();
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

try {
    $userId = $_GET['id'];
    $sql =  "SELECT * FROM action_history where user_id = '$userId'";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $urls = [];
    foreach ($data as $item) {
        $urls[] = $item['url'];    
    }
    echo json_encode($urls);
} catch (PDOException $e) {
    die($e->getMessage());
}
?>