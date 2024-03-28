<?php
require_once "../inc/db.inc.php";
  

$pdo = dbconnect();
$date = date("Y-m-d");
// echo $date;
if (array_key_exists('email',$_POST) && array_key_exists('username',$_POST) && array_key_exists('password',$_POST)){
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    try {
        $sql =  "SELECT email FROM user where email = '$email'";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetch();
        if (($stmt->rowCount()) == 0){
            try{
                // INSERT INTO `user` (`id`, `email`, `username`, `password`, `admin`, `status`, `date`) VALUES (NULL, '', '', '', '', '', '')
                $sql2 = "INSERT INTO user (`email`, `username`, `password`, `admin`, `status`, `date`) VALUES ";
                $sql2 .= "( '$email', '$username', '$hashedPassword', 'N', 'Enable', '$date')";
                $stmt2 = $pdo->prepare($sql2);
                $stmt2->execute();
                header('location: ../signin.php?successful=1');
            }
            catch (PDOException $e) {
                die($e->getMessage());
            }
        }else{
            header('location: ../register.php?error=1');
        }
        
    } catch (PDOException $e) {
    die($e->getMessage());
    }
}else{
    header('location: ../register.php?error=1');
}
?>

