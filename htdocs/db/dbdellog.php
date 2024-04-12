<?php
/* 1. Connect to the database */
require_once "../inc/db.inc.php";
$pdo = dbconnect();

/* 2. Validate and get data . . . */
if( !array_key_exists('id',$_GET) && !array_key_exists('user_id',$_GET)) {
    header('location: ../user.php');
    exit();
}else{

    $user_id = $_GET['user_id'];
    $id = $_GET['id'];
    
    try {
        /* 3. Prepare and execute SQL . . . */
        $sql =  "DELETE FROM log ";
        $sql .= " WHERE id = :id ";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        header('location: ../log.php?user_id='.$user_id);
        exit();
    
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}