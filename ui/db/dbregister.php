<?php
require_once "../inc/db.php";


$pdo = dbconnect();
$date = date("Y-m-d");
// echo $date;
if (array_key_exists('email', $_POST) && array_key_exists('username', $_POST) && array_key_exists('register_password', $_POST) && array_key_exists('re-enter_password', $_POST) && !empty($_POST['email']) && !empty($_POST['username']) && !empty($_POST['register_password']) && !empty($_POST['re-enter_password'])) {
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['register_password'];
    $repassword = $_POST['re-enter_password'];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    if ($password == $repassword && isPasswordStrong($password)){
        try {
            $sql = "SELECT email FROM user where email = '$email'";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $data = $stmt->fetch();
            if (($stmt->rowCount()) == 0) {
                try {
                    // INSERT INTO `user` (`id`, `email`, `username`, `password`, `admin`, `status`, `date`) VALUES (NULL, '', '', '', '', '', '')
                    $sql2 = "INSERT INTO user (`email`, `username`, `password`, `admin`, `status`, `date`) VALUES ";
                    $sql2 .= "( '$email', '$username', '$hashedPassword', 'N', 'Enable', '$date')";
                    $stmt2 = $pdo->prepare($sql2);
                    $stmt2->execute();
                    header('location: ../signin.php?successful=1');
                    exit(); 
                } catch (PDOException $e) {
                    die($e->getMessage());
                }
            } else {
                header('location: ../register.php?error=1');
                exit();
            }
    
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }else{
        header('location: ../register.php?error=2');
        exit();
    }
} else {
    header('location: ../register.php?error=1');
    exit();

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
?>