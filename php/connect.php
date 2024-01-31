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
header('Access-Control-Allow-Origin: *');

try {
    $sql =  "SELECT * FROM malicious_chain";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    $output = [];
    foreach ($data as $row) {
        if (!isset($output[$row['type']])) {
            $output[$row['type']] = [];
        }
        $codes = explode(', ', $row['code']);
        $output[$row['type']] = array_merge($output[$row['type']], $codes);
    }
    
    header('Content-Type: application/json');
    echo json_encode($output);
} catch (PDOException $e) {
    die($e->getMessage());
}
?>