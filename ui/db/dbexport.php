<?php
require_once "../inc/db.inc.php";
$pdo = dbconnect();

if(isset($_POST["date"]) && !empty($_POST["date"])) {
    $date = $_POST["date"];
    try {
        $sql =  "SELECT * FROM wordlist WHERE date < '$date' ";
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
    
        $filename = "wordlist.json";
        header("Content-Type: application/json");
        header("Content-Disposition: attachment; filename=" . $filename);
        echo json_encode($output, JSON_PRETTY_PRINT);
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}else{
    header('location: export.php');
    exit();
  }

?>