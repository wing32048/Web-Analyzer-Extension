<?php
require_once "../inc/db.php";
$pdo = dbconnect();
header('Access-Control-Allow-Origin: *');
// header('Content-Type: application/json');


if(isset($_POST["url"]) ) {
    $url = $_POST["url"];
    $parsedUrl = parse_url($url);
    // $host = isset($parsedUrl["host"]) ? $parsedUrl["host"] : "";
    // $urlwithouthttp = $host;
    try {
        // $sql =  "SELECT url FROM website where url = '$urlwithouthttp'";
        // $stmt = $pdo->prepare($sql);
        // $stmt->execute();
        // $data = $stmt->fetch();
        // if (($stmt->rowCount()) == 0){
        //     try{
        $sql2 = "INSERT INTO website (`url`) VALUES ('$url')";
        $stmt2 = $pdo->prepare($sql2);
        $stmt2->execute();
        echo "saved";
                // $stmt->execute();
                // $data = $stmt->fetch();
            // }
            // catch (PDOException $e) {
            //     die($e->getMessage());
            // }
        
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
} else {
    echo "url value not received.";
}

?>