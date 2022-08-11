<!DOCTYPE html>
<?php
header("Content-Type: text/html; charset=utf-8");
require_once("connMysql.php");
session_start();
require_once("login_check.php");
$sql ="SELECT *, YEAR(bdate) as year, MONTH(bdate) as month, DAYOFMONTH(bdate) as day FROM member WHERE account='".$_SESSION["account"]."'";
$RecLogin = mysqli_query($conn, $sql);
//取出帳號密碼的值
$search=mysqli_fetch_assoc($RecLogin);
$name=$search["Fname"];
$id=$search["identity"];
?>

<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>Alter page</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/input.css">
  </head>
  <body>
    <?php
        if($id=="S") $loc="student.php";
        if($id=="T") $loc="teacher.php";
    ?>
    <div class="topnav"> <p style="float:left; text-align: center; padding: 10px 15px;" target="_top"><?php echo $name; ?></p>
    <a href="logout.php" style="float:right" target="_top">Logout</a>
      <a href="<?php echo $loc ?>" style="float:right" target="_top">Home</a> <a href="<?php echo "student.php"; ?>"
        style="float:right" target="_top">Back</a> <a href="#" style="float:right"
        target="_top">Top</a> </div>
    <div class="header">
      <h1>修改個人資料</h1>
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
      <h1 style="font-weight: bold; text-align: center;">alter</h1>
    </b>
    <h1>[<strong>Hello <?php echo $name; ?></strong>]</h1>
    <b> </b>
    <p><br>
    </p>
    <p><br></p>
    <table style="width: 785px; height: 207px; text-align: left; margin-left: auto; margin-right: auto;">
      <tbody>
        <tr>
          <td> <br>
          <form name="form1" method="post" action="alter_check.php">
        <div>
          <hr size="1" />
          <p><strong>Account</strong>: 
          	<input type="text" name="account"
            value="<?php echo $search["account"];?>" disabled="true">
          </p>
          <p><strong>Password</strong>: 
            <input type="password" name="password"
            value="<?php echo $search["password"];?>" disabled="true">
          </p>
          <p><strong>First name</strong>: 
            <input type="text" name="Fname"
            value="<?php echo $search["Fname"];?>">
            <font color="#FF0000">*</font>
          </p>
          <p><strong>Last name</strong>:
            <input type="text" name="Lname"
            value="<?php echo $search["Lname"];?>">
            <font color="#FF0000">*</font>
          </p>
          <p><strong>Sex</strong>:
            <input type="radio" name="sex" value="M"
            <?php if($search["sex"]=="M") echo "checked";?>>男
            <input type="radio" name="sex" value="F"
            <?php if($row["sex"]=="F") echo "checked";?>>女
            <font color="#FF0000">*</font>
          </p>
          <p><strong>Birthday</strong>: 
          	<select name="year">
              <option <?php if ($search["year"] == "1990") echo "selected";?>>1990</option>
              <option <?php if ($search["year"] == "1991") echo "selected";?>>1991</option>
              <option <?php if ($search["year"] == "1992") echo "selected";?>>1992</option>
              <option <?php if ($search["year"] == "1993") echo "selected";?>>1993</option>
              <option <?php if ($search["year"] == "1994") echo "selected";?>>1994</option>
              <option <?php if ($search["year"] == "1995") echo "selected";?>>1995</option>
              <option <?php if ($search["year"] == "1996") echo "selected";?>>1996</option>
              <option <?php if ($search["year"] == "1997") echo "selected";?>>1997</option>
              <option <?php if ($search["year"] == "1998") echo "selected";?>>1998</option>
              <option <?php if ($search["year"] == "1999") echo "selected";?>>1999</option>
              <option <?php if ($search["year"] == "2000") echo "selected";?>>2000</option>
              <option <?php if ($search["year"] == "2001") echo "selected";?>>2001</option>
              <option <?php if ($search["year"] == "2002") echo "selected";?>>2002</option>
              <option <?php if ($search["year"] == "2003") echo "selected";?>>2003</option>
              <option <?php if ($search["year"] == "2004") echo "selected";?>>2004</option>
              <option <?php if ($search["year"] == "2005") echo "selected";?>>2005</option>
              <option <?php if ($search["year"] == "2006") echo "selected";?>>2006</option>
              <option <?php if ($search["year"] == "2007") echo "selected";?>>2007</option>
              <option <?php if ($search["year"] == "2008") echo "selected";?>>2008</option>
              <option <?php if ($search["year"] == "2009") echo "selected";?>>2009</option>
              <option <?php if ($search["year"] == "2010") echo "selected";?>>2010</option>
          	</select>year
          	<select name="month">
              <option <?php if ($search["month"] == "1") echo "selected";?>>1</option>
              <option <?php if ($search["month"] == "2") echo "selected";?>>2</option>
              <option <?php if ($search["month"] == "3") echo "selected";?>>3</option>
              <option <?php if ($search["month"] == "4") echo "selected";?>>4</option>
              <option <?php if ($search["month"] == "5") echo "selected";?>>5</option>
              <option <?php if ($search["month"] == "6") echo "selected";?>>6</option>
              <option <?php if ($search["month"] == "7") echo "selected";?>>7</option>
              <option <?php if ($search["month"] == "8") echo "selected";?>>8</option>
              <option <?php if ($search["month"] == "9") echo "selected";?>>9</option>
              <option <?php if ($search["month"] == "10") echo "selected";?>>10</option>
              <option <?php if ($search["month"] == "11") echo "selected";?>>11</option>
              <option <?php if ($search["month"] == "12") echo "selected";?>>12</option>
          	</select>month
          	<select name="day">
              <option <?php if ($search["day"] == "1") echo "selected";?>>1</option>
              <option <?php if ($search["day"] == "2") echo "selected";?>>2</option>
              <option <?php if ($search["day"] == "3") echo "selected";?>>3</option>
              <option <?php if ($search["day"] == "4") echo "selected";?>>4</option>
              <option <?php if ($search["day"] == "5") echo "selected";?>>5</option>
              <option <?php if ($search["day"] == "6") echo "selected";?>>6</option>
              <option <?php if ($search["day"] == "7") echo "selected";?>>7</option>
              <option <?php if ($search["day"] == "8") echo "selected";?>>8</option>
              <option <?php if ($search["day"] == "9") echo "selected";?>>9</option>
              <option <?php if ($search["day"] == "10") echo "selected";?>>10</option>
              <option <?php if ($search["day"] == "11") echo "selected";?>>11</option>
              <option <?php if ($search["day"] == "12") echo "selected";?>>12</option>
              <option <?php if ($search["day"] == "13") echo "selected";?>>13</option>
              <option <?php if ($search["day"] == "14") echo "selected";?>>14</option>
              <option <?php if ($search["day"] == "15") echo "selected";?>>15</option>
              <option <?php if ($search["day"] == "16") echo "selected";?>>16</option>
              <option <?php if ($search["day"] == "17") echo "selected";?>>17</option>
              <option <?php if ($search["day"] == "18") echo "selected";?>>18</option>
              <option <?php if ($search["day"] == "19") echo "selected";?>>19</option>
              <option <?php if ($search["day"] == "20") echo "selected";?>>20</option>
              <option <?php if ($search["day"] == "21") echo "selected";?>>21</option>
              <option <?php if ($search["day"] == "22") echo "selected";?>>22</option>
              <option <?php if ($search["day"] == "23") echo "selected";?>>23</option>
              <option <?php if ($search["day"] == "24") echo "selected";?>>24</option>
              <option <?php if ($search["day"] == "25") echo "selected";?>>25</option>
              <option <?php if ($search["day"] == "26") echo "selected";?>>26</option>
              <option <?php if ($search["day"] == "27") echo "selected";?>>27</option>
              <option <?php if ($search["day"] == "28") echo "selected";?>>28</option>
              <option <?php if ($search["day"] == "29") echo "selected";?>>29</option>
              <option <?php if ($search["day"] == "30") echo "selected";?>>30</option>
              <option <?php if ($search["day"] == "31") echo "selected";?>>31</option>
          	</select>day
            <font color="#FF0000">*</font><br>
          </p>
          <p><strong>Email</strong>:
            <input type="text" name="email"
            value="<?php echo $search["email"];?>">
            <font color="#FF0000">*</font>
          </p>
          <p><strong>Cellphone</strong>: 
            <input type="text" name="cellphone"
            value="<?php echo $search["cellphone"];?>">
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
      </tbody>
    </table>
    <div class="footer">
      <h2>THANK YOU!</h2>
    </div>
  </body>
</html>