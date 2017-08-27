<?php
/**
 * Created by IntelliJ IDEA.
 * User: blenz
 * Date: 4/29/17
 * Time: 3:37 PM
 */

include $_SERVER['DOCUMENT_ROOT'].'/../dbconfig.php';
$host = DB_HOST;
$db   = DB_DATABASE;
$user = DB_USER;
$pass = DB_PASSWORD;
$charset = 'utf8';

//// LOCAL
//$host = 'localhost';
//$db   = 'cs137_PA2';
//$user = 'root';
//$pass = 'root';
//$charset = 'utf8';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

try {
    $pdo = new PDO($dsn, $user, $pass);
}
catch (PDOException $e) {
    die('Unable to connect to database ' . $e->getMessage());
}