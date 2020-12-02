<?php
/**
 * Created by PhpStorm.
 * User: hueywen
 * Date: 13/10/2018
 * Time: 5:13 PM
 */
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','sample');
// Establish database connection.
try {
    $dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
} catch (PDOException $e) {
    exit("Error: " . $e->getMessage());
}
?>




