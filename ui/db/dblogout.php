<?php
require_once "../inc/db.inc.php";
require_once "../inc/userinfo.php";
$ip = UserInfo::get_ip();
$device =UserInfo::get_device();
$os = UserInfo::get_os();
$browser = UserInfo::get_browser();
$pdo = dbconnect();
try {
    try {
        // INSERT INTO `log` (`id`, `user_id`, `type`, `information`, `datetime`) VALUES (NULL, '', '', '', '2024-03-22 16:50:37.000000')
        $sql =  "INSERT INTO `log` (`user_id`, `type`, `information`, `datetime`) VALUES";
        $sql .= "('$cookieId', 'logout', 'IP address : $ip; Device : $device; OS : $os; Browser : $browser', '$datetime')";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetch();            
    } catch (PDOException $e) {
        die($e->getMessage());
    }        
    $cookieName = 'user';
    $cookieValue = $data['id'];
    $cookieExpiration = time() - (24 * 60 * 60);
    setcookie($cookieName, $cookieValue, $cookieExpiration, "/");
    header('Location: ../signin.php');
} catch (PDOException $e) {
    die($e->getMessage());
}
?>

