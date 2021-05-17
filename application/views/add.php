<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html> 
<html> 
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title> Add Record </title>
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
	td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}
tr:nth-child(even) {
  background-color: #dddddd;
}
</style> 
</head>  
<body>  
    <center> <h1> Add Record </h1> </center>
	<?php 
	$_LinkAdd 	=	(isset($_Record)) ? '/'.$_Record['id'] : '';
	?>
	<form name="record" id="record" method="post" action="<?php echo base_url();?>add<?=$_LinkAdd;?>" enctype="multipart/form-data">
		<input type="hidden" name="id" id="id" value="<?php echo (isset($_Record)) ? $_Record['id'] : '';?>"/>
		<div >
			<label>Type</label>
			<input type="text" name="type" id="type" value="<?php echo (isset($_Record)) ? $_Record['type'] : '';?>" />
		</div>
		<div>
			<label>Name</label>
			<input type="text" name="name" id="name" value="<?php echo (isset($_Record)) ? $_Record['name'] : '';?>" />
		</div>
		<div>
			<label>Magento ID</label>
			<input type="text" name="magento_id" id="magento_id" value="<?php echo (isset($_Record)) ? $_Record['magento_id'] : '';?>" />
		</div>
		<button style="width:150px;" name="save" type="submit">Save</button>
		</form>
</body>   
</html>
