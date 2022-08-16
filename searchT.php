<?php 
session_start();
//獲取搜索關鍵字
$keyword=trim($_POST["searchTeacher"]);
$acc=explode(" ",$keyword);
//檢查是否為空
if($keyword!=""){
    // $_SESSION["keyT"]=$keyword;
    $_SESSION["keyT"]=$acc[0];

}
else{
    echo "error";
    exit;//結束程序
}
header("Location: student.php");
?>
<!-- header("Location: student.php?keyword=<?=$keyword?>"); -->