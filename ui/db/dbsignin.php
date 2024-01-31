<?php
require_once "../inc/db.inc.php";

$pdo = dbconnect();
session_start();
unset($_SESSION["expiry"]);

if (array_key_exists('email',$_POST) && array_key_exists('password',$_POST)){
    $email = $_POST['email'];
    $password = $_POST['password'];
    try {
        $sql =  "SELECT password FROM user where email = '$email'";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetch();
        if ($data['password'] === $password && ($stmt->rowCount()) === 1){
            $_SESSION["expiry"] = time() + 900;
            header('Location: ../HomePage.php');
        }else{
            header('Location: ../signin.php?error=1');
        }
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}
?>

