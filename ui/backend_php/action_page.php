<?php
require_once "../inc/db.php";

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