<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html> 
<html> 
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title> Login Page </title>
<style> 
Body {
  font-family: Calibri, Helvetica, sans-serif;
  background-color: pink;
}
button { 
       background-color: #4CAF50; 
       width: 100%;
        color: orange; 
        padding: 15px; 
        margin: 10px 0px; 
        border: none; 
        cursor: pointer; 
         } 
 form { 
        border: 3px solid #f1f1f1; 
    } 
 input[type=text], input[type=password] { 
        width: 100%; 
        margin: 8px 0;
        padding: 12px 20px; 
        display: inline-block; 
        border: 2px solid green; 
        box-sizing: border-box; 
    }
 button:hover { 
        opacity: 0.7; 
    } 
  .cancelbtn { 
        width: auto; 
        padding: 10px 18px;
        margin: 10px 5px;
    } 
      
   
 .container { 
        padding: 25px; 
        background-color: lightblue;
    } 
</style> 
</head>  
<body>  
    <center> <h1> Student Login Form </h1> </center> 
    <form style="width: 30%; margin-left:35%" method="post" name="login" id="login" action="<?php echo base_url();?>home/login">
        <div class="container"> 
            <label>Username : </label> 
            <input type="text" placeholder="Enter Username" name="username" value="<?php if(isset($_PostData['username'])) echo $_PostData['username'];?>" required>
            <label>Password : </label> 
            <input type="password" placeholder="Enter Password" name="password" value="<?php if(isset($_PostData['password'])) echo $_PostData['username'];?>" required>
            <button type="submit">Login</button> 
        </div> 
    </form>	
</body>   
</html>
