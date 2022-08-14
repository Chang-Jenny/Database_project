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
      <h1 style="font-weight: bold; text-align: center;">查詢評量成績</h1>
    </b>
    <h1>[<strong>Hello <?php echo $name; ?></strong>]</h1>
    <b> </b>
    <p><br>
    </p>
    <table style="width: 785px; height: 207px; text-align: left; margin-left: auto; margin-right: auto;">
      <tbody>
        <tr>
        <form name="form1" method="post" action="tc.php">
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
    <form name="form1" method="post" action="te.php">
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


    <p><br></p>
    <table style="width: 785px; height: 207px; text-align: left; margin-left: auto; margin-right: auto;">
    <tr><td>
    <?php 
          // if(isset($_SESSION["keyT"])){
        if(!is_null($course) && !is_null($exam)){
        $sql="SELECT `Ename` FROM `exam` WHERE `Eid`='".$exam."'";
        $which = mysqli_query($conn, $sql);
        $w=mysqli_fetch_assoc($which);
        $en = $w["Ename"];

        echo "<div style="."text-align: left;".">";
        echo "<h3 style="."margin-left:30px;".">科目評量成績：".$en."</h3>";


        // $sql="SELECT `Ename` FROM `exam` WHERE `Ename`='".$exam."'";
        // $which = mysqli_query($conn, $sql);
        // $w=mysqli_fetch_assoc($which);
        // $en = $w["Ename"];


        echo "</div></td></tr>";
            // $courseT = $_SESSION["keyT"];
            echo "<tr>";
            echo "<td> 學生姓名 </td>";
            // echo "<td>  </td>";
            echo "<td> 及格 </td>";
            echo "<td> 成績 </td>";
            echo "<td> 測驗時間 </td>";
            echo "</tr>";
            }?>

        <?php 
            // if(isset($_SESSION["keyT"])){
            if(!is_null($course) && !is_null($exam)){
            $count=0;
            // $sql = "SELECT `Ename`, `Fname` FROM `course`, `exam` ,`member` WHERE `Cname`="."'".$course."'"." AND  `Cteacher`=`account` AND `account`=`Eteacher` AND `Eteacher`='".$courseT."'";
            // $sql = "SELECT `Ename`, `Lname` FROM `course`, `exam` ,`member` WHERE `Cname`="."'".$course."'"." AND  `Cteacher`='".$courseT."'"." AND `Cid`=`Ecid` AND `Cteacher`=`account`";
            $sql = "SELECT `Fname`, `Lname`,`pass`, `Rscore`, `time` FROM `result`,`member` WHERE `Reid`="."'".$exam."'"." AND  `Raccount`=`account`";
            $query = mysqli_query($conn, $sql);
            $colums=mysqli_num_fields($query); //得到列數
            echo $columns;
            while($search_exam=mysqli_fetch_row($query)){
              $count+=1;
              echo "<tr>";
              echo "<td>$search_exam[0]-$search_exam[1]</td>";
              

              for($i=2; $i<$colums; $i++){
              echo "<td>$search_exam[$i]</td>";
              }
            echo "</tr>";}
            $course=null;
            $exam=null;
            }
          ?>
    </table>
    <div class="footer">
      <h2>THANK YOU!</h2>
    </div>
  </body>
</html>

