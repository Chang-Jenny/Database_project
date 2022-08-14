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
// echo $whichexam;
$sql="SELECT `text` FROM `exam` WHERE `Ename`='".$_POST["whichone"]."'";
$document = mysqli_query($conn, $sql);
//取出帳號密碼的值
$dtemp=mysqli_fetch_assoc($document);
$doc = $dtemp["text"];
?>

<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>Main page</title>
    <link rel="stylesheet" href="css/exam.css">
    <link rel="stylesheet" href="css/input.css">
  </head>
  <body>
    <div class="topnav"> <p style="float:left; text-align: center; padding: 10px 15px;" target="_top"><?php echo $name; ?></p>
    <a href="logout.php" style="float:right" target="_top">Logout</a>
      <a href="student.php" style="float:right" target="_top">離開作答</a><a href="#" style="float:right"
        target="_top">Top</a> </div>
    <p><br>
    </p>
    <b>
    <h1 style="font-weight: bold; text-align: center;">開始!</h1>
    </b>
    <h1>[<strong>
    <?php 
    // $timezone = date_default_timezone_get();
    // echo "伺服器時區：" . $timezone; UTC
    date_default_timezone_set('Asia/Taipei');
    $first = new DateTime();
    echo $first->format('Y-m-d H:i:s');
    $_SESSION["firsttime"]=$first;
    ?></strong>]</h1>
    <b> </b>
    <p><br>
    </p>

    <p align="center"><?php echo $doc?></p>
    <table style="width: 785px; height: 207px; text-align: left; margin-left: auto; margin-right: auto;">
      <tbody>
      <form name="form1" method="post" action="answer_check.php">
        <tr>
        <?php
        $sql="SELECT `Qeid`,`Qid`,`question`,`A`, `B`, `C`, `D` FROM `questions`, `exam` WHERE `Ename`='".$whichexam."' AND `Qeid`=`Eid`";
        $query = mysqli_query($conn, $sql);
        $colums=mysqli_num_fields($query); //得到列數
        // $colnames=mysqli_fetch_field($query, 3);
        // echo "<tr><td>".$colnames."</td></tr>";
        $num=mysqli_num_rows($query);



        //有幾題題目的session
        $_SESSION["howmanyquestion"]=$num;
        // 有幾筆資料
        echo "<td>";
        while($search_q=mysqli_fetch_row($query)){

            //評量編號的session
            $_SESSION["whichexam"]=$search_q[0];
            echo "<tr>";
            // echo "<td>";
            // echo $search_q[0];

            // $temp=$search_q[0].$search_q[1];
            $temp=$search_q[1];

            for($i=1;$i<3;$i++){
                // if($search_q[$i]=="isnull") $colums-=1;
                // $ttt="44444";
                // $colums-=1;
                // $search_q[$i]=" ";
                echo "<td>";
                echo "<p>".$search_q[$i]."</p>";
                echo "</td>";
            }
            echo "<td>";
            echo "<p><strong>answer</strong>:";
            $c=0;
            for($i=3;$i<$colums;$i++){
                $c+=1;
                if($c==1) $v="A";
                if($c==2) $v="B";
                if($c==3) $v="C";
                if($c==4) $v="D";
                if($search_q[$i]=="isnull") break;
                echo "<td>";
                echo "<input type="."radio"." name=".$temp." value=".$v.">$search_q[$i]";
                echo "</td>";
            }
            // "A".$temp.$c
            
            echo "</tr>";
        }
        echo "</td>";
        ?>
        </tr>
        <!-- <tr><td><?echo "gogogo";?> </td></tr> -->
        <hr size="5" />
        <td>
        <p align="center">
          <input type="submit" name="set" value="OK">
          <input type="reset" name="reset" value="RESET">
        </p>
    </td>
      </form>
      </tbody>
    </table>
    <div class="footer">
      <h2>THANK YOU!</h2>
    </div>
  </body>
</html>