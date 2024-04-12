<?php
require_once "../inc/db.php";
$pdo = dbconnect();
if (isset($_POST['url']) && isset($_POST['user_id'])) {
    $url = $_POST['url'];
    $user_id = base64_decode(rawurldecode($_POST['user_id']));
    $today = date("Y-m-d");
    try {
        // Prepare and execute SQL statement
        $sql = "INSERT INTO whitelist (`user_id`, `url`, `date`) VALUES ('$user_id', :url, :today)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':url', $url);
        $stmt->bindParam(':today', $today);
        $stmt->execute();
        try {
            // INSERT INTO `log` (`id`, `user_id`, `type`, `information`, `datetime`) VALUES (NULL, '', '', '', '2024-03-22 16:50:37.000000')
            $sql =  "INSERT INTO `log` (`user_id`, `type`, `information`, `datetime`) VALUES";
            $sql .= "('$user_id', 'add', '$url to whitelist', '$datetime')";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
        // echo "Cookie value inserted into the database.";
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
}
?>