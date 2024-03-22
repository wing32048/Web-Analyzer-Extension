<?php
/* 1. Connect to the database */
require_once "../inc/db.inc.php";
$pdo = dbconnect();
$cookieId = $_COOKIE['user'];
/* 2. Validate and get data . . . */
if( !array_key_exists('id',$_GET) && !array_key_exists('admin',$_GET)) {
    header('location: ../user.php');
    exit();
}else{
    $id = $_GET['id'];
    $admin = $_GET['admin'];
    // echo $admin;
    // echo $id;
    try {
        /* 3. Prepare and execute SQL . . . */
        // UPDATE `user` SET `admin` = 'Y' WHERE `user`.`id` = 1;
        $sql =  "UPDATE `user` SET `admin` = :admin WHERE `user`.`id` = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":admin", $admin);
        $stmt->execute();
        try {
            if ($admin == 'Y'){
                $user_group = 'admin';
            }else{
                $user_group = 'user';
            }
            // INSERT INTO `log` (`id`, `user_id`, `type`, `information`, `datetime`) VALUES (NULL, '', '', '', '2024-03-22 16:50:37.000000')
            $sql =  "INSERT INTO `log` (`user_id`, `type`, `information`, `datetime`) VALUES";
            $sql .= "('$cookieId', 'login', 'switch user id : $id to $user_group', '$datetime')";
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
}