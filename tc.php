<?php 
session_start();
//獲取搜索關鍵字
$select=trim($_POST["searchCourse"]);
$acc=explode(" ",$select);
//檢查是否為空
if($select!=""){
    // $_SESSION["keyT"]=$keyword;
    $_SESSION["selectC"]=$acc[0];

}
else{
    echo "error";
    exit;//結束程序
}
header("Location: teacherscore.php");
?>