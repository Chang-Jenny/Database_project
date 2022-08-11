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

<?php
$whichexam=$_POST["whichone"];
?>

<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>Main page</title>
    <link rel="stylesheet" href="css/exam.css">
    <link rel="stylesheet" href="css/input.css">
  </head>
  <body>
    <div class="topnav"> <a href="resultScore.php" target="_top"> score</a>
    <a href="logout.php" style="float:right" target="_top">Logout</a>
      <a href="student.php" style="float:right" target="_top">Home</a><a href="#" style="float:right"
        target="_top">Top</a> </div>
    <p><br>
    </p>
    <b>
    <h1 style="font-weight: bold; text-align: center;">恭喜結束!</h1>
    </b>
    <h1>[<strong>
    <?php 
    // $timezone = date_default_timezone_get();
    // echo "伺服器時區：" . $timezone; UTC
    date_default_timezone_set('Asia/Taipei');
    $now = new DateTime();
    // echo $now;
    echo $now->format('Y-m-d H:i:s');
    // $test = $now->format('Y-m-d H:i:s');
    // echo $test;
    ?></strong>]</h1>
    <b> </b>
    <p><br>
    </p>
    <p><br></p>
    <?php
    $sql="SELECT answer FROM questions, exam WHERE Eid=".$_SESSION["whichexam"]." AND Qeid=Eid";
    $query = mysqli_query($conn, $sql);
    $colums=mysqli_num_fields($query); //得到列數

    //從whichexam.php來的
    // echo $_SESSION["howmanyquestion"]; //有幾題題目
    // echo $_SESSION["whichexam"]; //哪一項測驗
    //$_SESSION["firsttime"]; //開始測驗時間
    // echo $_POST["1"];
    // echo $_POST["2"];



    $sqlcondition="SELECT `passlimit`, `certify` FROM `exam` WHERE `Eid`='".$_SESSION["whichexam"]."'";
    $querycondition = mysqli_query($conn, $sqlcondition);
    //取出及格條件和積分
    while($searchcondition=mysqli_fetch_row($querycondition)){
      // echo "及格".$searchcondition[0];
      // echo "積分".$searchcondition[1];
      $pass=$searchcondition[0];
      $certify=$searchcondition[0];
    }

    //我的答案
    $youranswer;
    for($i=0;$i<$_SESSION["howmanyquestion"];$i++){
      $youranswer[$i]=$_POST[$i+1];
    }

    //正確答案
    $neb;
    $i=0;
    $rightanswer[$_SESSION["howmanyquestion"]];
    while($search_a=mysqli_fetch_row($query)){
      $rightanswer[$i]=$search_a[0];
      if($i<$_SESSION["howmanyquestion"]) $i+=1;
    }
    // for($j=0;$j<count($rightanswer);$j++) echo "正確:".$rightanswer[$j];
    // for($j=0;$j<count($rightanswer);$j++) echo "自己：".$youranswer[$j];

    //正確題數
    $right=0;
    for($k=0;$k<count($rightanswer);$k++){
      if($rightanswer[$k]==$youranswer[$k]){
          $right+=1;
      }
    }
    //分數
    $sc=$right/$_SESSION["howmanyquestion"]*100;
    $sc=number_format($sc, 2);
    //判斷是否及格
    $YN="";
    if($right>=$pass) $YN="Y";
    else $YN="N"
    ?>

    <table style="width: 785px; height: 207px; text-align: left; margin-left: auto; margin-right: auto;">
      <tbody>
        <?php 
        
          echo "<tr>";
          echo "<td>";
          echo "評量名稱：";
          $s="SELECT `Ename` ,`certify` FROM `exam` WHERE `Eid`='".$_SESSION["whichexam"]."'";
          $q = mysqli_query($conn, $s);
          $searchname=mysqli_fetch_assoc($q);
          $name = $searchname["Ename"];
          $certify=$searchname["certify"];
          echo $name;
          echo "</td>";
          echo "</tr>";

          echo "<tr>";
          echo "<td>";
          echo "開始測驗時間：";
          echo $_SESSION["firsttime"]->format('Y-m-d H:i:s');
          echo "</td>";
          echo "</tr>";

          echo "<tr>";
          echo "<td>";
          echo "答對題數：".$right;
          echo "</td>";
          echo "</tr>";

          echo "<tr>";
          echo "<td>";
          echo "你的分數：".$sc;
          echo "</td>";
          echo "</tr>";

          echo "<tr>";
          echo "<td>";
          echo "積分加：";
          if($YN=="Y") echo $certify;
          else echo "0";
          echo "</td>";
          echo "</tr>";

          echo "<tr>";
          echo "<td>";
          echo "及格：".$YN;
          echo "</td>";
          echo "</tr>";
        ?>

<?php
  $date = $_SESSION["firsttime"]->format('Y-m-d H:i:s');
  $cal = "SELECT `score` FROM `member` WHERE `account` ='".$_SESSION["account"]."'";
  $calscore = mysqli_query($conn, $cal);
  $calculate=mysqli_fetch_row($calscore);

  if($YN=="Y"){
    // echo "cal:".$calculate[0];
    $sss= (int)$calculate[0]+(int)$certify;
    // echo "cal:".$calculate[0];
    // echo "分數", $sss;
    $sql = "UPDATE `member` SET ";
    $sql .= "`score`='".$sss."'";
    $sql .= "WHERE `account`= '".$_SESSION["account"]."'";
    mysqli_query($conn,$sql);
  }else{
    $calculate[0]=$calculate[0];
  }
  
  //確認使用者是否有做過此評量
  $sql = "SELECT `Raccount`, `Reid` FROM `result` WHERE `Raccount` ='".$_SESSION["account"]."' AND `Reid` ='".$_SESSION["whichexam"]."'";
  $record = mysqli_query($conn, $sql);
  // echo mysqli_num_rows($record);
  
  if(mysqli_num_rows($record)>0) {
    $sql = "UPDATE `result` SET ";
    $sql .= "`pass`='".$YN."',";
    $sql .= "`Rscore`= $sc"." ,";
    $sql .= "`time`='".$date."'";
    $sql .= "WHERE `Raccount`= '".$_SESSION["account"]."' AND `Reid`='".$_SESSION["whichexam"]."'";
    mysqli_query($conn,$sql);
  } 
  else {
    //若使用者沒有做過此評量
    $sql = "INSERT INTO result (`Raccount`, `Reid`, `pass`, `Rscore`, `time`) VALUES (";
    $sql .= "'".$_SESSION["account"]."',";
    $sql .= "'".$_SESSION["whichexam"]."',";
    $sql .= "'".$YN."',";
    $sql .= $sc.",";
    $sql .= "'".$date."')";
    mysqli_query($conn, $sql);
  }
?>


      <tr>
        <td >
        <hr size="1" />
        <p align="center">
        <a href="student.php">
        <input value="return"></a></p>


        <!-- <form name="form1" method="post" action="student.php">
        <hr size="1" />
        <p align="center">
          <input type="submit" name="return" value="return"> -->
        <!-- </p>
      </form> -->

        </td>
      </tr>
      </tbody>
    </table>
    <div class="footer">
      <h2>THANK YOU!</h2>
    </div>
  </body>
</html>