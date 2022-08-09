<?php
//檢查是否登入過
if(!isset($_SESSION["account"]) || ($_SESSION["account"]=="")){
    header("Location: index.php/?errMsg=1");
}
?>