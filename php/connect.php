<?php
$dsn = 'mysql:dbname=fyp;host=127.0.0.1;charset=UTF8';
$dbuser = 'root';
$dbpwd = '';

function dbconnect() {
    try {
        global $dsn, $dbuser, $dbpwd;
        $pdo = new PDO($dsn, $dbuser, $dbpwd);
        $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        die('Database Error');
    }
}

$pdo = dbconnect();
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

// if (isset($_COOKIE['id'])) {
    // $cookieValue = $_COOKIE['id'];
    // 
    try {
        $userId = $_GET['id'];
        $sql = "SELECT * FROM malicious_chain where user_id = '$userId'";
        $stmt = $pdo->prepare($sql);
        // $stmt->bindValue(':userId', $userId);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $output = [];
        foreach ($data as $row) {
            $id = $row['id'];
            $type = $row['type'];
            $code = $row['code'];
            
            if (!isset($output[$id])) {
                $output[$id] = [
                    'type' => $type,
                    'chains' => [],
                ];
            }
        
            $chains = explode(", ", $code);

            foreach ($chains as $chain) {
                if (!in_array($chain, $output[$id]['chains'])) {
                    $output[$id]['chains'][] = $chain;
                }
            }
        }
        $jsonOutput = json_encode($output);
        echo $jsonOutput;
        
        
        // Further code execution
    } catch (PDOException $e) {
        die($e->getMessage());
    }
// }

?>