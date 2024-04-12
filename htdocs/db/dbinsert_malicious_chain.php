<?php
require_once "../inc/db.inc.php";


$pdo = dbconnect();
$date = date("Y-m-d");
// echo $date;
if (array_key_exists('type', $_POST) && array_key_exists('code', $_POST) && !empty($_POST['type']) && !empty($_POST['code'])) {
    $type = $_POST['type'];
    $code = $_POST['code'];
    try {
        $sql = "SELECT * FROM malicious_chain where code = '$code'";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetch();
        if (($stmt->rowCount()) == 0) {
            try {
               // INSERT INTO `malicious_chain` (`id`, `user_id`, `type`, `code`, `date`) VALUES (NULL, '', '', '', '')
                $sql2 = "INSERT INTO malicious_chain (`user_id`, `type`, `code`, `date`) VALUES ";
                $sql2 .= "('$cookieId', '$type', '$code', '$date')";
                $stmt2 = $pdo->prepare($sql2);
                $stmt2->execute();
                $sql =  "INSERT INTO `log` (`user_id`, `type`, `information`, `datetime`) VALUES";
                $sql .= "('$cookieId', 'add', 'malicious_chain type:$type code:$code ', '$datetime')";
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
                header('location: ../insert_malicious_chain.php?successful=1');
                exit();
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        } else {
            header('location: ../insert_malicious_chain.php?error=1');
            exit();
        }

    } catch (PDOException $e) {
        die($e->getMessage());
    }
} else {
    header('location: ../insert_malicious_chain.php?error=2');
    exit();
}

?>