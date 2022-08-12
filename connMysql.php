<?php
//資料庫主機
$db_host = 'localhost:8889';
$db_username = 'root';
$db_password = 'root';
$db_table = 'newSystem';

// $create_db_sql = "CREATE DATABASE IF NOT EXISTS `phpbook_db`;";
// $create_table_sql = "CREATE TABLE IF NOT EXISTS `phpbook_db`.`member` ( `id` INT NOT NULL AUTO_INCREMENT , `NAME` VARCHAR(20) NOT NULL ,`account` VARCHAR(20) NOT NULL , `passwword` VARCHAR(20) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";
//資料庫連線
$conn = mysqli_connect($db_host, $db_username, $db_password);
if(!$conn){
  echo "Error: Unable to connect to MySQL." . PHP_EOL;
  echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
  echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
  die("無法連線至資料庫");
}
// $ret = mysqli_query($conn, $create_db_sql);
//     if(!$ret){
//         echo "Error: Unable to connect to MySQL." . PHP_EOL;
//         echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
//         echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
//         die("建立db失敗");
//     }
// 設定連線編碼
$select = mysqli_select_db($conn, $db_table);
if(!$select){
  die("無法選擇至資料庫");
}
mysqli_query($conn, "SET NAMES 'utf8'");

// 建立table
// $ret = mysqli_query($conn, $create_table_sql);

// if(!$ret){
//     echo "Error: Unable to connect to MySQL." . PHP_EOL;
//     echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
//     echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
//     die("建立table失敗");
// }
// mysqli_close($conn);
?>