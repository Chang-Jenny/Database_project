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
      <h1>新增評量-老師端</h1>
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
      <h1 style="font-weight: bold; text-align: center;">新增評量</h1>
    </b>
    <h1>[<strong>Hello <?php echo $name; ?></strong>]</h1>
    <b> </b>
    <p><br>
    </p>
    <table style="width: 785px; height: 207px; text-align: left; margin-left: auto; margin-right: auto;">
      <tbody>
        <tr>
          <td> 
          <form name="form1" method="post" action="insert_check.php">
        <p><font size="6" color="#9D5628">新增評量設定</font></p>
        <div>
          <hr size="1" />
          <p><strong>評量編號</strong>: 
          	<input type="text" name="id">
          	<font color="#FF0000">*</font>
          </p>
          <p><strong>評量名稱</strong>: 
            <input type="text" name="name">
            <font color="#FF0000">*</font>
          </p>
          <p><strong>評量種類</strong>:
            <input type="radio" name="type" value="choose">選擇題
            <!-- <input type="radio" name="sex" value="chooes">選擇題 -->
            <font color="#FF0000">*</font>
          </p>
          <p><strong>科目名稱</strong>: 
          	<select name="cname">
              <?php 
              $sql="SELECT Cname FROM member, course WHERE account= '".$_SESSION["account"]."'"."AND Cteacher=account";
              $query = mysqli_query($conn, $sql);
                while($search_course=mysqli_fetch_row($query)){
                echo "<option>".$search_course[0]."</option>";} 
                ?>
          	</select>
            <font color="#FF0000">*</font><br>
          </p>
          <p><strong>及格題數</strong>:
            <input type="text" name="pass">
            <font color="#FF0000">*</font>
          </p>
          <p><strong>總題數</strong>: 
            <input type="text" name="total">
            <font color="#FF0000">*</font>
          </p>
          <p><strong>認證積分</strong>: 
          <select name="score">
          		<option>1</option>
          		<option>2</option>
          		<option>3</option>
          	</select>分
            <font color="#FF0000">*</font>
          </p>
          <p><strong>說明</strong>: 
            <input type="text" name="txt">
          </p>

          <p><font color="#FF0000">*</font> 表示為必填的欄位</p>
        </div>
        <hr size="5" />
        <p align="center">
          <input type="submit" name="go" value="送出">
          <input type="reset" name="reset" value="RESET">
        </p>
      </form>

          </td>
        </tr>
      </tbody>
    </table>
    <div class="footer">
      <h2>THANK YOU!</h2>
    </div>
  </body>
</html>

