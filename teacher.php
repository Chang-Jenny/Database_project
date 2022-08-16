<!DOCTYPE html>
<?php
header("Content-Type: text/html; charset=utf-8");
require_once("connMysql.php");
session_start();
require_once("login_check.php");
$sql="SELECT `Fname` FROM `member` WHERE `account`='".$_SESSION["account"]."'";
$RecLogin = mysqli_query($conn, $sql);
//取出帳號密碼的值
$search=mysqli_fetch_assoc($RecLogin);
$name = $search["Fname"];
?>

<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>Main page</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/input.css">
  </head>
  <body>
    <div class="topnav"> <p style="float:left; text-align: center; padding: 10px 15px;" target="_top"><?php echo $name; ?></p>
    <a href="logout.php" style="float:right" target="_top">Logout</a>
      <a href="teacher.php" style="float:right" target="_top">Home</a> <a href="alter.php"

        style="float:right" target="_top">Alter</a> <a href="#" style="float:right"

        target="_top">Top</a> </div>
    <div class="header">
      <h1>線上答題系統-老師端</h1>
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
      <h1 style="font-weight: bold; text-align: center;">線上答題系統</h1>
    </b>
    <h1>[<strong>Hello <?php echo $name; ?></strong>]</h1>
    <b> </b>
    <p><br>
    </p>
    <table style="width: 785px; height: 207px; text-align: left; margin-left: auto; margin-right: auto;">
      <tbody>
        <tr>
          <td> <br>
            <div style="text-align: left;">
            <form name="form1" method="post" action="teacherinsert.php">
        <hr size="1" />
        <p align="center" >
          <input type="submit" name="insert" value="新增評量">
        </p>
      </form>
      <form name="form1" method="post" action="teachermodifyquestion.php">
        <hr size="1" />
        <p align="center">
          <input type="submit" name="insertquestion" value="修改評量題目">
        </p>
      </form>
      <form name="form1" method="post" action="teachersearch.php">
        <hr size="1" />
        <p align="center">
          <input type="submit" name="searchmyexam" value="查詢我的評量">
        </p>
      </form>
      
      <form name="form1" method="post" action="teacherscore.php">
        <hr size="1" />
        <p align="center">
          <input type="submit" name="searchscore" value="查詢評量成績">
        </p>
      </form>
      <form name="form1" method="post" action="addcourse.php">
        <hr size="1" />
        <p align="center">
          <input type="submit" name="add" value="新增科目">
        </p>
      </form>

            <br>
          </td>
        </tr>
      </tbody>
    </table>
    <div class="footer">
      <h2>THANK YOU!</h2>
    </div>
  </body>
</html>
