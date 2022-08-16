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
    <div class="topnav"> <a href="#" target="_top"> score</a>
    <a href="logout.php" style="float:right" target="_top">Logout</a>
      <a href="student.php" style="float:right" target="_top">Home</a> <a href="alter.php"
        style="float:right" target="_top">Alter</a> <a href="#" style="float:right"
        target="_top">Top</a> </div>
    <div class="header">
      <h1>學生成績單</h1>
      <p><br>
      </p>
      </p>
      <p style="color: white ; font-style: italic ; text-align: center;
                font-family: Lucida Console;font-size: 25px;">
      <strong>Hello <?php echo $name; ?></strong></p>
    </div>
    <p><br>
    </p>
    <b>
    <h1 style="font-weight: bold; text-align: center;">成績單</h1>
    </b>
    <h1>[<strong>Hello <?php echo $name; ?></strong>]</h1>
    <?php
    $sql="SELECT `score` FROM `member` WHERE `account`='".$_SESSION["account"]."'";
    $s = mysqli_query($conn, $sql);
    //取出帳號密碼的值
    $search=mysqli_fetch_assoc($s);
    $score = $search["score"];
    ?>


    <b> </b>
    <p><br>
    </p>
    <table style="width: 785px; height: 207px; text-align: left; margin-left: auto; margin-right: auto;">
      <tbody>
      <tr>
          <td>評量名稱</td>
          <td>是否及格</td>
          <td>分數</td>
          <td>時間</td>
        </tr>
        <?php
        $sql = "SELECT `Ename`, `pass`, `Rscore`, `time` FROM `result`, `exam`, `member` WHERE `account`= '".$_SESSION["account"]."' AND `Raccount`=`account` AND `Reid`=`Eid`";
        $query = mysqli_query($conn, $sql);
        $colums=mysqli_num_fields($query); //取得列數
        $num=mysqli_num_rows($query);
        while($search_result=mysqli_fetch_row($query)){
            echo "<tr>";
            for($i=0; $i<$colums; $i++){
              echo "<td>$search_result[$i]</td>";}
              echo "</tr>";}
        ?>

        <tr>
          <td> <?php echo "累計積分：".$score;?>
          </td>
        </tr>
      </tbody>
    </table>
    <div class="footer">
      <h2>THANK YOU!</h2>
    </div>
  </body>
</html>
