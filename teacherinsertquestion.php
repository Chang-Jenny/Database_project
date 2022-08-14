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

// echo $_SESSION["eid"];
// echo $_SESSION["ename"];
// echo $_SESSION["etype"];
// echo $_SESSION["total"];
// $_SESSION["pass"]=$_POST["pass"];

?>

<?php




?>

<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>me</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/input.css">
  </head>
  <body>
    <div class="topnav"> <a href="#" target="_top"> Schedule</a>
    <a href="logout.php" style="float:right" target="_top">Logout</a>
      <a href="teacher.php" style="float:right" target="_top">Home</a> <a href="teacher.php"

        style="float:right" target="_top">Back</a> <a href="#" style="float:right"

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
      <h1 style="font-weight: bold; text-align: center;">新增題目</h1>
    </b>
    <h1>[<strong>Hello <?php echo $name; ?></strong>]</h1>
    <b> </b>
    <p><br>
    </p>
    <table style="width: 785px; height: 207px; text-align: left; margin-left: auto; margin-right: auto;">
      <tbody>
        <tr>
          <td> 
          <form name="form1" method="post" action="insertquestion_check.php">
        <p><font size="6" color="#9D5628">新增評量題目</font></p>
        <div>
          <hr size="1" />
          <p><strong>評量編號</strong>: 
          	<input type="text" name="id"
              value="<?php echo $_SESSION["eid"];?>" disabled="true">
          	<font color="#FF0000">*</font>
          </p>
          <p><strong>評量名稱</strong>: 
            <input type="text" name="name"
            value="<?php echo $_SESSION["ename"];?>" disabled="true">
            <font color="#FF0000">*</font>
          </p>
          <?php
          for($i=1;$i<=$_SESSION["total"];$i++){
            echo "<tr>";
            echo "<td>";
            echo "<p><strong>題目".$i."</strong>: <input type="."text"." name=Q".$i.">";
            echo "<font color="."#FF0000".">*</font>";
            echo "<p><strong>選項A</strong>: <input type="."text"." name=CA".$i.">";
            echo "<font color="."#FF0000".">*</font>";
            echo "<p><strong>選項B</strong>: <input type="."text"." name=CB".$i.">";
            echo "<font color="."#FF0000".">*</font>";
            echo "<p><strong>選項C</strong>: <input type="."text"." name=CC".$i.">";
            echo "<p><strong>選項D</strong>: <input type="."text"." name=CD".$i.">";
            echo "<p><strong>答案</strong>: ";
            echo "<input type="."radio"." name=answer".$i." value='A'>A ";
            echo "<input type="."radio"." name=answer".$i." value='B'>B ";
            echo "<input type="."radio"." name=answer".$i." value='C'>C ";
            echo "<input type="."radio"." name=answer".$i." value='D'>D ";
            echo "</td>";
            echo "</tr>";
          }
          ?>
        <!-- <p><strong>選項A</strong>: 
            <input type="text" name="c1">
            <font color="#FF0000">*</font>
          </p>
          <p><strong>選項B</strong>: 
            <input type="text" name="c2">
            <font color="#FF0000">*</font>
          </p>
          <p><strong>選項C</strong>: 
            <input type="text" name="c3">
          </p>
          <p><strong>選項D</strong>: 
            <input type="text" name="c4">
          </p> -->
          
        </div>
        <hr size="5" />
        <td>
        <p><font color="#FF0000">*</font> 表示為必填的欄位</p>
        <p align="center">
          <input type="submit" name="go" value="送出">
          <input type="reset" name="reset" value="RESET">
        </p>
        </td>
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