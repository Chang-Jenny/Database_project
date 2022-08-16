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
    <div class="topnav"> <a href="resultScore.php" target="_top"> score</a>
    <a href="logout.php" style="float:right" target="_top">Logout</a>
      <a href="student.php" style="float:right" target="_top">Home</a> <a href="alter.php"
        style="float:right" target="_top">Alter</a> <a href="#" style="float:right"
        target="_top">Top</a> </div>
    <div class="header">
      <h1>線上答題系統-學生端</h1>
      <p><br>
      </p>
      </p>
      <p style="color: white ; font-style: italic ; text-align: center;
                font-family: Lucida Console;font-size: 25px;">
      <strong>Welcome <?php echo $name; ?></strong></p>
    </div>
    <p><br>
    </p>
    <p><br>
    </p>
    <b>
    <h1 style="font-weight: bold; text-align: center;">搜尋評量</h1>
    </b>
    <h1>[<strong>Hello <?php echo $name; ?></strong>]</h1>
    <b> </b>
    <p><br>
    </p>

    <table style="width: 785px; height: 207px; text-align: left; margin-left: auto; margin-right: auto;">
    <tr>
    <td>
    <!-- 得到科目名字 -->
    <form name="form1" method="post" action="searchC.php">
    <?php 
    $sql = "SELECT DISTINCT"."("."`Cname`".")"." FROM `course`, `member` WHERE `Cteacher`=`account`";
    // $sql="SELECT * FROM `course`";
    $query = mysqli_query($conn, $sql);
    // 有幾筆資料
    $num=mysqli_num_rows($query);
    ?>
    <p><strong>科目</strong>:
    <select name="searchCourse">
      <?php 
      while($search_course=mysqli_fetch_row($query)){
      echo "<option>".$search_course[0]."</option>";} 
      ?>
    </select></p></td>
    <td>
    <input type="submit" name="submit" value="searchC"></td>
    <td>
    <p><?php 
    if(isset($_SESSION["key"])){
      $course = $_SESSION["key"];
      echo $course;}
      else{echo "";}?>
    </p>
    </form>
    </td>
    </tr>


    <tr>
    <td>
    <form name="form1" method="post" action="searchT.php">
    <p><strong>老師</strong>:
    <select name="searchTeacher">
      <?php
      if(isset($_SESSION["key"])){
      $course = $_SESSION["key"];
      $sql = "SELECT `account`,`Lname` FROM `course`, `member` WHERE `Cname`= "."'".$course."'"." AND `Cteacher`=`account`";
      $query = mysqli_query($conn, $sql);
      while($search_teacher=mysqli_fetch_row($query)){
      echo "<option>".$search_teacher[0]." ".$search_teacher[1]."</option>";}}
      ?>
    </select></p></td>
    <td>
    <input type="submit" name="submit" value="searchT"></td>

    <td>
    <p><?php
    if(isset($_SESSION["keyT"])){
      $courseT = $_SESSION["keyT"];
      echo $courseT;
      // unset($_SESSION["key"]);
      unset($_SESSION["keyT"]);
    }
    else{echo "";}

    // if(isset($_SESSION["key"])){
    //   $courseN = $_SESSION["key"];
    //   echo $courseN;}
    // else{echo "";}

      ?>
    </p>
    </form>
    </td>

    </tr>
    </table>
    <p><br></p>
    <table style="width: 785px; height: 207px; text-align: left; margin-left: auto; margin-right: auto;">
      <tbody>
        <tr><td>
        <?php 
          // if(isset($_SESSION["keyT"])){
        if(!is_null($course) && !is_null($courseT)){
        echo "<div style="."text-align: left;".">";
        echo "<h3 style="."margin-left:10px;".">評量列表</h3>";
        echo "</div></td></tr>";
            // $courseT = $_SESSION["keyT"];
            echo "<tr>";
            echo "<td> 評量名稱 </td>";
            echo "<td> 出題者 </td>";
            echo "<td> done </td>";
            echo "</tr>";
            }?>

        <?php 
            // if(isset($_SESSION["keyT"])){
            if(!is_null($course) && !is_null($courseT)){
            $count=0;
            // $sql = "SELECT `Ename`, `Fname` FROM `course`, `exam` ,`member` WHERE `Cname`="."'".$course."'"." AND  `Cteacher`=`account` AND `account`=`Eteacher` AND `Eteacher`='".$courseT."'";
            $sql = "SELECT `Ename`, `Lname` FROM `course`, `exam` ,`member` WHERE `Cname`="."'".$course."'"." AND  `Cteacher`='".$courseT."'"." AND `Cid`=`Ecid` AND `Cteacher`=`account`";
            $query = mysqli_query($conn, $sql);
            $colums=mysqli_num_fields($query); //得到列數
            echo $columns;
            while($search_exam=mysqli_fetch_row($query)){
              $count+=1;
              echo "<tr>";
              for($i=0; $i<$colums; $i++){
              echo "<td>$search_exam[$i]</td>";
              }
              $doexamname=$search_exam[0];
              echo "<td>";
              echo "<form name="."form1 ".
              "method="."post ". "action="."whichexam.php"."> 
              <p align="."center".">
              <input type="."submit"." name="."whichone"." value=".$doexamname.">
              </p>
            
            </form>";
            echo "</td>";
            echo "</tr>";}
            $courseN=null;
            $courseT=null;
            }
          ?>
          <!-- <script>
          function show(){
          $_SESSION["whichone"] = $doexamname;}</script> -->
          <!-- <button type="."submit" ."name="."whichone"." value=$doexamname>do</button> -->
          <!-- <p align="."center"."> -->
          <!-- <input type="."submit"." name="."whichone"." value=".$doexamname."> -->
          <!-- </p> -->
      </tbody>
    </table>
    <div class="footer">
      <h2>THANK YOU!</h2>
    </div>
  </body>
</html>