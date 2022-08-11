<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>add</title>
  <link rel="stylesheet" href="css/input.css">
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
</head>
<body>
<table width="800" border="0" align="center" cellpadding="4" cellspacing="0">
  <tr valign="top">
    <td width="600">
    	<form name="form1" method="post" action="addcourse_check.php">
        <div>
          <hr size="1" />
          <p><strong>科目編號</strong>: 
          	<input type="text" name="id">
          	<font color="#FF0000">*</font>
          </p>
          <p><strong>科目名稱</strong>: 
            <input type="text" name="name">
            <font color="#FF0000">*</font>
          </p>
          <p><font color="#FF0000">*</font> 表示為必填的欄位</p>
        </div>
        <hr size="5" />
        <p align="center">
          <input type="submit" name="join" value="送出">
          <input type="reset" name="reset" value="RESET">
        </p>
      </form>
	  <p align="center"><a href="teacher.php">RETURN</a></p>
    </td>
  </tr>
</table>
</body>
</html>