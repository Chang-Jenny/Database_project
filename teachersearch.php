<!DOCTYPE html>
<?php
header("Content-Type: text/html; charset=utf-8");
require_once("connMysql.php");
session_start();
require_once("login_check.php");
$sql="SELECT `*` FROM `member` WHERE `account`='".$_SESSION["account"]."'";
$RecLogin = mysqli_query($conn, $sql);
//取出帳號密碼的值
$search=mysqli_fetch_assoc($RecLogin);
$name = $search["Fname"];
?>

<?php
$sql="SELECT `Eid`, `Ename` FROM  `member` ,`exam`  WHERE `account`= '".$_SESSION["account"]."'"." AND `Eteacher`=`account`";
$sql="SELECT `Eid`, `Ename` ,`Cname` FROM  `member` ,`exam`  ,`course` WHERE `account`= '".$_SESSION["account"]."'"." AND `Eteacher`=`account` AND `Ecid`=`Cid`";
$search = mysqli_query($conn, $sql);
?>

<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>me</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/input.css">
  </head>
  <body>
    <div class="topnav"> <p style="float:left; text-align: center; padding: 10px 15px;" target="_top"><?php echo $name; ?></p>
    <a href="logout.php" style="float:right" target="_top">Logout</a>
      <a href="teacher.php" style="float:right" target="_top">Home</a> <a href="teacher.php"

        style="float:right" target="_top">Back</a> <a href="#" style="float:right"

        target="_top">Top</a> </div>
    <div class="header">
      <h1>查詢我的評量-老師端</h1>
      <p><br>
      </p>
      </p>
      <p style="color: white ; font-style: italic ; text-align: center;
                font-family: Lucida Console;font-size: 25px;">
      <strong>Hello <?php echo $name; ?></strong></p>
    </div>
    <p><br>
    </p>
    <p><br>
    </p>
    <b>
      <h1 style="font-weight: bold; text-align: center;">查詢我的評量</h1>
    </b>
    <h1>[<strong>Hello <?php echo $name; ?></strong>]</h1>
    <b> </b>
    <p><br>
    </p>
    <table style="width: 785px; height: 207px; text-align: left; margin-left: auto; margin-right: auto;">
      <tbody>
        <tr><td>評量編號</td>
        <td>評量名稱</td>
        <td>科目名稱</td>
      <td>題數</td></tr>
      <?php 

            $colums=mysqli_num_fields($search); //得到列數
            echo $columns;
            while($search_exam=mysqli_fetch_row($search)){
              echo "<tr>";
              for($i=0; $i<$colums; $i++){
              echo "<td>$search_exam[$i]</td>";
              }
              $temp="SELECT Eid, count(*) AS num FROM exam, questions WHERE Qeid= '".$search_exam[0]."' "."GROUP BY Eid";

              $temp_s = mysqli_query($conn, $temp);
              $num=mysqli_fetch_row($temp_s);
              if(!is_null($num)) echo "<td>$num[1]</td>";
              else echo "<td>"."0"."</td>";
              // echo "<td><a href='doexam.php'> do </a></td>";
              echo "</tr>";}
          ?>
      </tbody>
    </table>
    <div class="footer">
      <h2>THANK YOU!</h2>
    </div>
  </body>
</html>

