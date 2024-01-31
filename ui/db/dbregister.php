<?php
    require_once './inc/db.php';
  

$pdo = dbconnect();
session_start();
unset($_SESSION["expiry"]);

if (array_key_exists('email',$_POST) && array_key_exists('username',$_POST) && array_key_exists('password',$_POST)){
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    try {
        $sql =  "SELECT email FROM user where email = '$email'";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetch();
        // echo $stmt->rowCount();
        // echo $data['email'];
        if (($stmt->rowCount()) == 0){
            try{
                $sql2 = "INSERT INTO user (`email`, `username`, `password`) VALUES ( '$email', '$username', '$password')";
                $stmt2 = $pdo->prepare($sql2);
                $stmt2->execute();
                $stmt->execute();
                $data = $stmt->fetch();
                if (($stmt->rowCount()) == 1){
                    header('location: ../register.php?error=2');
                }
            }
            catch (PDOException $e) {
                die($e->getMessage());
            }
        }else{
            header('location: ../register.php?error=3');
        }
        
    } catch (PDOException $e) {
    die($e->getMessage());
    }
}
?>

