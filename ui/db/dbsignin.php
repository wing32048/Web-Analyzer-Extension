<?php
require_once "../inc/db.inc.php";
require_once "../inc/userinfo.php";
$ip = UserInfo::get_ip();
$device =UserInfo::get_device();
$os = UserInfo::get_os();
$browser = UserInfo::get_browser();
$pdo = dbconnect();

if (array_key_exists('email',$_POST) && array_key_exists('password',$_POST)){
    $email = $_POST['email'];
    $password = $_POST['password'];
    try {
        $sql =  "SELECT id,password FROM user where email = '$email' AND status = 'Enable'";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetch();
        $cookieName = 'user';
        $cookieValue = base64_encode($data['id']);
        $cookieExpiration = time() + (24 * 60 * 60);
        setcookie($cookieName, $cookieValue, $cookieExpiration, "/");
        
        if (password_verify($password, $data['password']) && ($stmt->rowCount()) === 1){
            try {
                // INSERT INTO `log` (`id`, `user_id`, `type`, `information`, `datetime`) VALUES (NULL, '', '', '', '2024-03-22 16:50:37.000000')
                $sql =  "INSERT INTO `log` (`user_id`, `type`, `information`, `datetime`) VALUES";
                $sql .= "('$cookieValue', 'login', 'IP address : $ip; Device : $device; OS : $os; Browser : $browser', '$datetime')";
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
                $data = $stmt->fetch();            
            } catch (PDOException $e) {
                die($e->getMessage());
            }        
            header('Location: ../account.php');
        }else{
            header('Location: ../signin.php?error=1');
        }
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}else{
    header('Location: ../signin.php?error=1');
}
?>

