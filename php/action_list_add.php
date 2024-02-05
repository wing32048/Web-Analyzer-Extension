<?php

$dsn = 'mysql:dbname=fyp;host=localhost;charset=UTF8';
$dbuser = 'root';
$dbpwd = '';

function dbconnect() {
    try {
        global $dsn, $dbuser, $dbpwd;
        $pdo = new PDO($dsn, $dbuser, $dbpwd);
        $pdo->setAttribute(PDO::ATTR_ERRMODE,
                        PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        die('Database Error');
    }
}
$pdo = dbconnect();
// $data = json_decode(file_get_contents('php://input'), true);

// if (isset($data['cookieValue'])) {
//     $cookieValue = $data['cookieValue'];

//     try {
//         // Prepare and execute SQL statement
//         $sql = "INSERT INTO cookie (cookie) VALUES (:cookieValue)";
//         $stmt = $pdo->prepare($sql);
//         $stmt->bindParam(':cookieValue', $cookieValue);
//         $stmt->execute();

//         echo "Cookie value inserted into the database.";
//     } catch (PDOException $e) {
//         die("Error: " . $e->getMessage());
//     }
// } else {
//     echo "Cookie value not received.";
// }
if (isset($_POST['url']) && isset($_POST['user_id'])) {
    $url = $_POST['url'];
    $user_id = $_POST['user_id'];
    $today = date("Y-m-d");
    try {
        // Prepare and execute SQL statement
        $sql = "INSERT INTO action_history (`user_id`, `url`, `date`) VALUES (:user_id, :url, :today)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':url', $url);
        $stmt->bindParam(':today', $today);
        $stmt->execute();

        // echo "Cookie value inserted into the database.";
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
}
?>