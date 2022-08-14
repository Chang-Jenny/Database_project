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
      <h1>修改題目-老師端</h1>
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
      <h1 style="font-weight: bold; text-align: center;">修改評量題目</h1>
    </b>
    <h1>[<strong>Hello <?php echo $name; ?></strong>]</h1>
    <b> </b>
    <p><br>
    </p>
    <table style="width: 785px; height: 207px; text-align: left; margin-left: auto; margin-right: auto;">
      <tbody>
        <tr>
        <form name="form1" method="post" action="tc_2.php">
    <td>
    <?php 
    $sql = "SELECT `Cid`,`Cname` FROM `course` WHERE `Cteacher`='".$_SESSION["account"]."'";
    // $sql="SELECT * FROM `course`";
    $query = mysqli_query($conn, $sql);
    // 有幾筆資料
    $num=mysqli_num_rows($query);
    ?>
    <p><strong>我的科目</strong>:
    <select name="searchCourse">
      <?php 
      while($search_course=mysqli_fetch_row($query)){
      echo "<option>".$search_course[0]." ".$search_course[1]."</option>";} 
      ?>
    </select></p>
    </td>
    <td>
    <input type="submit" name="submit" value="searchC"></td>
    <td>
    <p><?php 
    if(isset($_SESSION["selectC"])){
      $course = $_SESSION["selectC"];
      echo $course;}
      else{echo "";}?>
    </p>
    </td>
    </form>
        </tr>


    <tr>
    <form name="form1" method="post" action="te_2.php">
    <td>
    <?php 
    $sql = "SELECT `Eid`,`Ename` FROM `exam` WHERE `Ecid`='".$_SESSION["selectC"]."'";
    // $sql="SELECT * FROM `course`";
    $query = mysqli_query($conn, $sql);
    // 有幾筆資料
    $num=mysqli_num_rows($query);
    ?>
    <p><strong>評量名稱</strong>:
    <select name="searchexam">
      <?php 
      while($search_course=mysqli_fetch_row($query)){
      echo "<option>".$search_course[0]." ".$search_course[1]."</option>";} 
      ?>
    </select></p>
    </td>
    <td>
    <input type="submit" name="submit" value="searchE"></td>
    <td>
    <p><?php 
    if(isset($_SESSION["selectE"])){
      $exam = $_SESSION["selectE"];
      echo $exam;}
      else{echo "";}?>
    </p>
    </td>
    </form>
        </tr>
      </tbody>
    </table>

<?php
$sql="SELECT Qeid, COUNT(*) AS total FROM questions WHERE Qeid='".$_SESSION["selectE"]."' GROUP BY Qeid";
$y = mysqli_query($conn, $sql);
//取出帳號密碼的值
$search=mysqli_fetch_assoc($y);
$total=$search["total"];

$sql="SELECT Qid, question, A,B,C,D, answer FROM questions WHERE Qeid='".$_SESSION["selectE"]."'";
$mod = mysqli_query($conn, $sql);
$colums=mysqli_num_fields($mod); //得到列數
?>











    <p><br></p>
    <table style="width: 785px; height: 207px; text-align: left; margin-left: auto; margin-right: auto;">
    <tr>
        <td>
        <div>
        <?php
        echo "<tr>";
        echo "<td>";echo "題號";echo "</td>";
        echo "<td>";echo "題目";echo "</td>";
        echo "<td>";echo "A";echo "</td>";
        echo "<td>";echo "B";echo "</td>";
        echo "<td>";echo "C";echo "</td>";
        echo "<td>";echo "D";echo "</td>";
        echo "<td>";echo "answer";echo "</td>";
        echo "</tr>";
        while($modify=mysqli_fetch_row($mod)){
            echo "<tr>";
            for($i=0;$i<$colums;$i++){
                echo "<td>";
                echo $modify[$i];
                echo "</td>";
            }
            echo "</tr>";
        }
        ?>
        </div>
        <hr size="5" />
        </td>
    </tr>
    </table>

    <form name="form1" method="post" action="modify_check.php">
    <p align="center"><strong>題號</strong>: 
          	<select name="qnum">
                <?php
                for($i=1;$i<=$total;$i++) 
                echo "<option>$i</option>";
                ?>
          	</select>題
        <p align="center">
        <input type="submit" name="go" value="送出">
        <input type="reset" name="reset" value="RESET">
        </p>
    </form>

    <div class="footer">
      <h2>THANK YOU!</h2>
    </div>
  </body>
</html>

