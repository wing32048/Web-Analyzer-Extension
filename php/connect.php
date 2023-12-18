<?php
$dsn = 'mysql:dbname=fyp;host=127.0.0.1;charset=UTF8';
$dbuser = 'root';
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

try {
    $sql =  "SELECT code FROM wordlist";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $codes = $stmt->fetchAll(PDO::FETCH_COLUMN);

    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    echo json_encode($codes);
  } catch (PDOException $e) {
    die($e->getMessage());
}
?>