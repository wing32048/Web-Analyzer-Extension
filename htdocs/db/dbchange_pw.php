<?php
/* 1. Connect to the database */
require_once "../inc/db.inc.php";
$pdo = dbconnect();
/* 2. Validate and get data . . . */
if( !array_key_exists('current_password',$_POST) && !array_key_exists('password',$_POST) && !array_key_exists('confirm_password',$_POST)) {
    header('location: ../change_pw.php');
    exit();
}else{
    $current_password = $_POST['current_password'];
    $password = $_POST['password'];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    try {
        $sql =  "SELECT password FROM user where id = '$cookieId'";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetch();
        if (!password_verify($current_password, $data['password']) && ($stmt->rowCount()) <= 0){
            header('location: ../change_pw.php?error=1');
        }else{
            if ($_POST['password'] == $_POST['confirm_password'] && isPasswordStrong($password)){
                try {
                    $sql = "UPDATE `user` SET `password` = :hashedPassword WHERE `user`.`id` = :cookieId";
                    $stmt = $pdo->prepare($sql);
                    $stmt->bindParam(':hashedPassword', $hashedPassword);
                    $stmt->bindParam(':cookieId', $cookieId);
                    $stmt->execute();
                    try {
                        // INSERT INTO `log` (`id`, `user_id`, `type`, `information`, `datetime`) VALUES (NULL, '', '', '', '2024-03-22 16:50:37.000000')
                        $sql =  "INSERT INTO `log` (`user_id`, `type`, `information`, `datetime`) VALUES";
                        $sql .= "('$cookieId', 'update', 'Changed password', '$datetime')";
                        $stmt = $pdo->prepare($sql);
                        $stmt->execute();
                        $data = $stmt->fetch();
                        header('location: ../account.php');
                    } catch (PDOException $e) {
                        die($e->getMessage());
                    } 
                } catch (PDOException $e) {
                    die($e->getMessage());
                }  
            }else{
                header('location: ../change_pw.php?error=2');
            }
        }           
    } catch (PDOException $e) {
        die($e->getMessage());
    } 
}

function isPasswordStrong($password) {
    // Check minimum length
    if (strlen($password) < 8) {
      return false;
    }
  
    // Check for at least one uppercase letter
    if (!preg_match('/[A-Z]/', $password)) {
      return false;
    }
  
    // Check for at least one lowercase letter
    if (!preg_match('/[a-z]/', $password)) {
      return false;
    }
  
    // Check for at least one digit
    if (!preg_match('/\d/', $password)) {
      return false;
    }
  
    // Check for at least one special character
    // if (!preg_match('/[^a-zA-Z\d]/', $password)) {
    //   return false;
    // }
  
    // Password passed all checks
    return true;
  }