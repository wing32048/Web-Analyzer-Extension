<?php
$dsn = 'mysql:dbname=fyp;host=192.168.140.100;charset=UTF8';
$dbuser = 'www-data';
$dbpwd = '';

function dbconnect() {
  try {
    global $dsn, $dbuser, $dbpwd;
    $pdo = new PDO($dsn, $dbuser, $dbpwd);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,
                     PDO::ERRMODE_EXCEPTION);
    return $pdo;
  } catch (PDOException $e) {
    die('Database Error');
  }
}