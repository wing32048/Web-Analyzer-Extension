<?php
/* 1. Connect to the database */
require_once "../inc/db.inc.php";
$pdo = dbconnect();

/* 2. Validate and get data . . . */
if( !array_key_exists('id',$_GET) && !array_key_exists('status',$_GET)) {
    header('location: ../user.php');
    exit();
}
$id = $_GET['id'];
$status = $_GET['status'];
// echo $status;
// echo $id;
try {
    /* 3. Prepare and execute SQL . . . */
    // UPDATE `user` SET `status` = 'Disable' WHERE `user`.`id` = 1;
    $sql =  "UPDATE `user` SET `status` = :status WHERE `user`.`id` = :id ";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":id", $id);
    $stmt->bindParam(":status", $status);
    $stmt->execute();
    try {
        // INSERT INTO `log` (`id`, `user_id`, `type`, `information`, `datetime`) VALUES (NULL, '', '', '', '2024-03-22 16:50:37.000000')
        $sql =  "INSERT INTO `log` (`user_id`, `type`, `information`, `datetime`) VALUES";
        $sql .= "('$cookieId', 'update', 'Switch user id : $id to $status', '$datetime')";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetch();            
    } catch (PDOException $e) {
        die($e->getMessage());
    } 
    header('location: ../user.php');
    exit();

} catch (PDOException $e) {
    die($e->getMessage());
}