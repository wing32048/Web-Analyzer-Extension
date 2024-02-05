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