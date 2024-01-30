<?php
/* 1. Connect to the database */
require_once "./inc/db.php";
$pdo = dbconnect();

/* 2. Validate and get data . . . */
if( !array_key_exists('id',$_GET) ) {
    header('location: whitelist.php');
    exit();
  }
  $id = $_GET['id'];
  
try {
  /* 3. Prepare and execute SQL . . . */
  $sql =  "DELETE FROM whitelist ";
  $sql .= " WHERE id = :id ";
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(":id", $id);
  $stmt->execute();
  header('location: whitelist.php');
  exit();

} catch (PDOException $e) {
  die($e->getMessage());
}