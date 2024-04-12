<?php
/* 1. Connect to the database */
require_once "../inc/db.inc.php";
$pdo = dbconnect();
/* 2. Validate and get data . . . */
if( !array_key_exists('email',$_POST) && !array_key_exists('confirm_email',$_POST)) {
    header('location: ../change_email.php');
    exit();
}else{
    if ($_POST['email'] == $_POST['confirm_email']){

        $email = $_POST['email'];
        // echo $admin;
        // echo $id;
        try {
            /* 3. Prepare and execute SQL . . . */
            // UPDATE `user` SET `username` = 'administrato' WHERE `user`.`id` = 1;
            $sql =  "UPDATE `user` SET `email` = '$email' WHERE `user`.`id` = $cookieId";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            try {
                // INSERT INTO `log` (`id`, `user_id`, `type`, `information`, `datetime`) VALUES (NULL, '', '', '', '2024-03-22 16:50:37.000000')
                $sql =  "INSERT INTO `log` (`user_id`, `type`, `information`, `datetime`) VALUES";
                $sql .= "('$cookieId', 'update', 'Change email to $email', '$datetime')";
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
                $data = $stmt->fetch();            
            } catch (PDOException $e) {
                die($e->getMessage());
            }   
            header('location: ../account.php');
            exit();
        
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }else{
        header('location: ../change_email.php?error=1');
    }
}