<?php
session_start();
unset($_SESSION["account"]);
unset($_SESSION["password"]);
unset($_SESSION["key"]);
unset($_SESSION["keyT"]);
unset($_SESSION["selectC"]);
unset($_SESSION["selectE"]);

unset($_SESSION["eid"]);
unset($_SESSION["ename"]);
unset($_SESSION["etype"]);
unset($_SESSION["total"]);
unset($_SESSION["pass"]);
unset($_SESSION["whichexam"]);


// session_destroy();
header("Location: index.php")
?>