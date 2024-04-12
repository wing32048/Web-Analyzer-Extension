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
        $sql =  "DELETE FROM whitelist ";
        $sql .= " WHERE id = :id ";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        try {
            // INSERT INTO `log` (`id`, `user_id`, `type`, `information`, `datetime`) VALUES (NULL, '', '', '', '2024-03-22 16:50:37.000000')
            $sql =  "INSERT INTO `log` (`user_id`, `type`, `information`, `datetime`) VALUES";
            $sql .= "('$cookieId', 'delete', 'Delete whitelist id : $id', '$datetime')";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $data = $stmt->fetch();            
        } catch (PDOException $e) {
            die($e->getMessage());
        } 
        header('location: ../whitelist.php?user_id='.$user_id);
        exit();
    
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}