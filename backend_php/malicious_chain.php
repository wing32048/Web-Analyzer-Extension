<?php
require_once "../inc/db.php";

$pdo = dbconnect();
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');


try {
    $userId = base64_decode($_GET['id']);
    $sql = "SELECT * FROM malicious_chain where user_id = '$userId'";
    $stmt = $pdo->prepare($sql);
    // $stmt->bindValue(':userId', $userId);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($stmt->rowCount() <= 0){
        $sql = "SELECT * FROM malicious_chain where user_id = '1'";
        $stmt = $pdo->prepare($sql);
        // $stmt->bindValue(':userId', $userId);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    $output = [];
    foreach ($data as $row) {
        $id = $row['id'];
        $type = $row['type'];
        $code = $row['code'];
        
        if (!isset($output[$id])) {
            $output[$id] = [
                'type' => $type,
                'chains' => [],
            ];
        }
    
        $chains = explode(",", $code);

        foreach ($chains as $chain) {
            if (!in_array($chain, $output[$id]['chains'])) {
                $output[$id]['chains'][] = $chain;
            }
        }
    }
    $jsonOutput = json_encode($output);
    echo $jsonOutput;
    
    
    // Further code execution
} catch (PDOException $e) {
    die($e->getMessage());
}


?>