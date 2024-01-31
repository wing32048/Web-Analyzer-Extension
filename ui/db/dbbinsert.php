<?php
require_once "./inc/db.php";
$pdo = dbconnect();

if(isset($_POST["url"]) && !empty($_POST["url"]) ) {
    $url = $_POST["url"];
    $parsedUrl = parse_url($url);
    $host = isset($parsedUrl["host"]) ? $parsedUrl["host"] : "";
    // $path = isset($parsedUrl["path"]) ? $parsedUrl["path"] : "";
    $urlwithouthttp = $host;
    $today = date("Y-m-d");
    // echo "URL without HTTP prefix: " . $urlWithoutHttp;
    try {
        $sql =  "SELECT url FROM blacklist where url = '$urlwithouthttp'";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetch();
        // echo $stmt->rowCount();
        // echo $data['email'];
        if (($stmt->rowCount()) == 0){
            try{
                $sql2 = "INSERT INTO blacklist (`user_id`, `url`, `date`) VALUES ( '1', '$urlwithouthttp', '$today')";
                $stmt2 = $pdo->prepare($sql2);
                $stmt2->execute();
                $stmt->execute();
                $data = $stmt->fetch();
                if (($stmt->rowCount()) == 1){
                    header('location: ./blacklist.php');
                }
            }
            catch (PDOException $e) {
                die($e->getMessage());
            }
        }else{
            header('location: ./binsert.php?error=3');
        }
        
    } catch (PDOException $e) {
    die($e->getMessage());
    }
}else{
    header('location: binsert.php');
    exit();    
}

