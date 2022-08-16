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

$sql="SELECT Qid, question, A,B,C,D, answer FROM questions WHERE Qeid='".$_SESSION["selectE"]."'"." AND `Qid`='".$_POST["qnum"]."'";
$mod = mysqli_query($conn, $sql);
//取出帳號密碼的值
$modify=mysqli_fetch_assoc($mod);
$_SESSION["qnum"]=$_POST["qnum"];
?>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>Alter page</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/input.css">
  </head>
  <body>
    <div class="topnav"> <p style="float:left; text-align: center; padding: 10px 15px;" target="_top"><?php echo $name; ?></p>
    <a href="logout.php" style="float:right" target="_top">Logout</a>
      <a href="<?php echo $loc ?>" style="float:right" target="_top">Home</a> <a href="<?php echo "teacher.php"; ?>"
        style="float:right" target="_top">Back</a> <a href="#" style="float:right"
        target="_top">Top</a> </div>
    <div class="header">
      <h1>修改題目</h1>
      <p><br>
      </p>
    </div>
    <p><br></p>
    <table style="width: 785px; height: 207px; text-align: left; margin-left: auto; margin-right: auto;">
      <tbody>
        <tr>
          <td> <br>
          <form name="form1" method="post" action="modify_checkcheck.php">
        <div>
          <hr size="1" />
          <p><strong>題號</strong>: 
          	<input type="text" name="qid"
            value="<?php echo $modify["Qid"];?>" disabled="true">
          </p>
          <p><strong>question</strong>: 
            <input type="text" name="question"
            value="<?php echo $modify["question"];?>">
            <font color="#FF0000">*</font>
          </p>
          <p><strong>A</strong>:
            <input type="text" name="A"
            value="<?php echo $modify["A"];?>">
            <font color="#FF0000">*</font>
          </p>
          <p><strong>B</strong>:
            <input type="text" name="B"
            value="<?php echo $modify["B"];?>">
            <font color="#FF0000">*</font>
          </p>
          <p><strong>C</strong>:
            <input type="text" name="C"
            value="<?php echo $modify["C"];?>">
            <font color="#FF0000">*</font>
          </p>
          <p><strong>D</strong>:
            <input type="text" name="D"
            value="<?php echo $modify["D"];?>">
            <font color="#FF0000">*</font>
          </p>
          <p><strong>Answer</strong>:
            <input type="radio" name="answer" value="A"
            <?php if($modify["answer"]=="A") echo "checked";?>>A
            <input type="radio" name="answer" value="B"
            <?php if($modify["answer"]=="B") echo "checked";?>>B
            <input type="radio" name="answer" value="B"
            <?php if($modify["answer"]=="C") echo "checked";?>>C
            <input type="radio" name="answer" value="B"
            <?php if($modify["answer"]=="D") echo "checked";?>>D
            <font color="#FF0000">*</font>
          </p>
          <p><font color="#FF0000">*</font> 表示為必填的欄位</p>
        </div>
        <hr size="5" />
        <p align="center">
          <input type="submit" name="update" value="UPDATE">
          <input type="reset" name="reset" value="RESET">
        </p>
      </form>
</td>
</tr>
</table>
      <div class="footer">
      <h2>THANK YOU!</h2>
    </div>
  </body>
</html>