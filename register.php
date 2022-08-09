<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Register</title>
  <style>
  p{
  font-size: 6mm;
  font-family: "MV Boli";
  color:#5A331E;}
  body {
  font-family: Arial;
  padding:0px;
  background: #F2EFE7;}
  </style> 
  <script language="javascript">
  function check_form() {
	  var acct = document.form1.account.value;
	  if(acct=="") {		
		  alert("請填寫帳號!");
		  return false;
	  } 
		if(acct.length<3 || acct.length>20){
			alert( "帳號長度只能3至20個字元!");
			return false;
		}
	  var pw1 = document.form1.password1.value;
	  var pw2 = document.form1.password2.value;
	  if(pw1=="") {
		  alert("密碼不可以空白!");
		  return false;
	  }
	  for(var i=0; i<pw1.length; i++) {
		  if(pw1.charAt(i)==" " || pw1.charAt(i)=="\"") {
			  alert("密碼不可以含有空白或雙引號!\n");
			  return false;
		  }
	  }
	  if(pw1.length<3 || pw1.length>20) {
		  alert("密碼長度只能3到20個字元!\n" );
		  return false;
	  }
	  if(pw1!=pw2) {
		  alert("兩次輸入密碼不一樣,請重新輸入!\n");
		  return false;
	  }
	  if(document.form1.Fname.value=="" || document.form1.Lname.value=="") {
		  alert("請填寫姓名!");
		  return false;
	  }
	  if(document.form1.email.value=="") {
		  alert("請填寫Email!");
		  return false;
	  }
      var cel = document.form1.cellphone.value;
      if(cel.length<10 || cel=="") {
		  alert("cellphone格式不正確");
		  return false;
	  }
	  return confirm("確定送出？");
  }
  </script>
</head>
<body>
<table width="800" border="0" align="center" cellpadding="4" cellspacing="0">
  <tr valign="top">
    <td width="600">
    	<form name="form1" method="post" action="register_check.php" onSubmit="return check_form();">
        <p><font size="6" color="#9D5628">JOIN US</font></p>
		  	<?php if(isset($_GET["registered"])){?>
          <div>帳號 <?php echo $_GET["account"];?> 已經有人使用！</div>
        <?php }?>
        <div>
          <hr size="1" />
          <p><strong>Account</strong>: 
          	<input type="text" name="account">
          	<font color="#FF0000">*</font>
          </p>
          <p><strong>Password</strong>: 
            <input type="password" name="password1">
            <font color="#FF0000">*</font>
          </p>
          <p><strong>Check password</strong>: 
            <input type="password" name="password2">
            <font color="#FF0000">*</font>
          </p>
          <p><strong>First name</strong>: 
            <input type="text" name="Fname">
            <font color="#FF0000">*</font>
          </p>
          <p><strong>Last name</strong>:
            <input type="text" name="Lname">
            <font color="#FF0000">*</font>
          </p>
          <p><strong>Sex</strong>:
            <input type="radio" name="sex" value="M">男
            <input type="radio" name="sex" value="F">女
            <font color="#FF0000">*</font>
          </p>
          <p><strong>Birthday</strong>: 
          	<select name="year">
          		<option>1990</option>
          		<option>1991</option>
          		<option>1992</option>
          		<option>1993</option>
          		<option>1994</option>
          		<option>1995</option>
          		<option>1996</option>
          		<option>1997</option>
          		<option>1998</option>
          		<option>1999</option>
          		<option>2000</option>
          		<option>2001</option>
          		<option>2002</option>
          		<option>2003</option>
          		<option>2004</option>
          		<option>2005</option>
          		<option>2006</option>
          		<option>2007</option>
          		<option>2008</option>
          		<option>2009</option>
          		<option>2009</option>
          		<option>2010</option>
          	</select>year
          	<select name="month">
          		<option>1</option>
          		<option>2</option>
          		<option>3</option>
          		<option>4</option>
          		<option>5</option>
          		<option>6</option>
          		<option>7</option>
          		<option>8</option>
          		<option>9</option>
          		<option>10</option>
          		<option>11</option>
          		<option>12</option>
          	</select>month
          	<select name="day">
          		<option>1</option>
          		<option>2</option>
          		<option>3</option>
          		<option>4</option>
          		<option>5</option>
          		<option>6</option>
          		<option>7</option>
          		<option>8</option>
          		<option>9</option>
          		<option>10</option>
          		<option>11</option>
          		<option>12</option>
          		<option>13</option>
          		<option>14</option>
          		<option>15</option>
          		<option>16</option>
          		<option>17</option>
          		<option>18</option>
          		<option>19</option>
          		<option>20</option>
          		<option>21</option>
          		<option>22</option>
          		<option>23</option>
          		<option>24</option>
          		<option>25</option>
          		<option>26</option>
          		<option>27</option>
          		<option>28</option>
          		<option>29</option>
          		<option>30</option>
          		<option>31</option>
          	</select>day
            <font color="#FF0000">*</font><br>
          </p>
          <p><strong>Email</strong>:
            <input type="text" name="email">
            <font color="#FF0000">*</font>
          </p>
          <p><strong>Cellphone</strong>: 
            <input type="text" name="cellphone">
            <font color="#FF0000">*</font>
          </p>
		  <p><strong>Identity</strong>:
            <input type="radio" name="identity" value="student">Student
            <input type="radio" name="identity" value="teacher">Teacher
            <font color="#FF0000">*</font>
          </p>

          <p><font color="#FF0000">*</font> 表示為必填的欄位</p>
        </div>
        <hr size="5" />
        <p align="center">
          <input type="submit" name="join" value="JOIN">
          <input type="reset" name="reset" value="RESET">
        </p>
      </form>
	  <p align="center"><a href="index.php">RETURN</a></p>
    </td>
  </tr>
</table>
</body>
</html>