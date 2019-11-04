
<?php
session_start();
 $mysqli = new mysqli('localhost', 'root', '', 'nguoidung') or die(mysqli_error($mysqli));
 $query = "SELECT * FROM user";
  if ($_SERVER['REQUEST_METHOD']=='POST') {
        $UserName = $_POST['UserName'];
        $Password = $_POST['Password'];
        var_dump($UserName);
        var_dump($Password);
          $result =  $mysqli->query($query);
          if($result->num_rows>0){
             while($row = $result->fetch_assoc()){
                 if(strcmp($UserName, $row['UserName'])==0 && strcmp($Password, $row['Password'])==0){
                  $_SESSION['login']="Thành công";
                      header("location: kiemtra.php");
                 }
                 else{
                   $error = "Your Login Name or Password is invalid";
                 }        
             }
          }
       }
?>
<!-- <html>
   
   <head>
      <title>Login Page</title>
      
      <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
         }
         label {
            font-weight:bold;
            width:100px;
            font-size:14px;
         }
         .box {
            border:#666666 solid 1px;
         }
      </style>
      
   </head>
   
   <body bgcolor = "#FFFFFF"> -->
	
      <!-- <div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>
				
            <div style = "margin:30px">
               
               <form action = "kiemtra.php" method = "post">
                  <label>UserName  :</label><input type = "text" name = "UserName" class = "box"/><br /><br />
                  <label>Password  :</label><input type = "password" name = "Password" class = "box" /><br/><br />
                  <input type = "submit" value = " Submit "/><br />
               </form>
               
               
					
            </div>
				
         </div>
			
      </div>
 -->
 <!--Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Classy Login form Widget Flat Responsive Widget Template :: w3layouts</title>
<script src="../js/jquery.min.js"></script>
<!-- Custom Theme files -->
<link href="../css/style.css" rel="stylesheet" type="text/css" media="all"/>
<!-- for-mobile-apps -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<meta name="keywords" content="Classy Login form Responsive, Login form web template, Sign up Web Templates, Flat Web Templates, Login signup Responsive web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<!-- //for-mobile-apps -->
<!--Google Fonts-->
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700' rel='stylesheet' type='text/css'>
</head>
<body>
<!--header start here-->
<div class="header">
      <div class="header-main">
             <h1>Login Form</h1>
         <div class="header-bottom">
            <div class="header-right w3agile">
               
               <div class="header-left-bottom agileinfo">
                  
                <form action="Login.php" method="post">

               <input type="text"  value="User name" name="UserName" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'User name';}"/>
               <input type="password"  value="Password" name="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'password';}"/>
                  <div class="remember">
                      <span class="checkbox1">
                        <label class="checkbox"><input type="checkbox" name="" checked=""><i> </i>Remember me</label>
                   </span>
                   <div class="forgot">
                     <h6><a href="#">Forgot Password?</a></h6>
                   </div>
                  <div class="clear"> </div>
                 </div>
                  
                  <input type="submit" value="Login">
               </form>  
               <div class="header-left-top">
                  <div class="sign-up"> <h2>or</h2> </div> 
               </div>
            </div>
            </div>
           
         </div>
      </div>
</div>
</body>
</html>