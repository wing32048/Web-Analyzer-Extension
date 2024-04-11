<?php
require_once "../inc/db.php";
$pdo = dbconnect();

if (isset($_POST['url']) && isset($_POST['user_id'])) {
    $url = $_POST['url'];
    $user_id = base64_decode(rawurldecode($_POST['user_id']));
    $today = date("Y-m-d");
    try {
        // Prepare and execute SQL statement
        $sql = "INSERT INTO action_history (`user_id`, `url`, `date`) VALUES ('$user_id', :url, :today)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':url', $url);
        $stmt->bindParam(':today', $today);
        $stmt->execute();

        // echo "Cookie value inserted into the database.";
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
}
?>