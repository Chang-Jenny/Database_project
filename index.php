<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Main page</title>
        <style>
            p{
            font-size: 6mm;
            font-family: "MV Boli";
            color:#5A331E;}
            body {
            font-family: Arial;
	        padding:0px;
            background: #F2EFE7;}
            input{
            cursor:pointer;
            background-color:#F2EFE7;
            border:2px #5A331E solid;}
            input:hover{
            background-color:#fff;
            border-radius:5px;}
        </style>    
    </head>
    <body>
        <form name="formal" method="post" action="login.php">
            <table width="250" align="center">
                <tr varign="top"><td align="center">
                <p>線上答題系統</p>
                <p>account: <br>
                    <input name="account" type="text"
                    value="<?php echo $_COOKIE["account"];?>">
                </p>
                <p>password: <br>
                    <input name="password" type="password"
                    value="<?php echo $_COOKIE["password"];?>">
                </p>
                <p><input name="rememberme" type="checkbox" value="true">Remember</p>
                <p align="center">
                    <input name="login" type="submit"
                    value="LOG IN" style="width:120px;height:50px;">
                </p>
                <p><a href="register.php">register</a></p>
                </td>
                </tr>
            </table>
        </form>
    </body>
</html>