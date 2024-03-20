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
    header('location: ../user.php');
    exit();

} catch (PDOException $e) {
    die($e->getMessage());
}