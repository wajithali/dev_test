<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html> 
<html> 
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title> Records </title>
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
 th.sort_ASC:after {
	content: "▲";
}
 th.sort_DESC:after {
	content: "▼";
}
</style> 
</head>  
<body>  
    <center> <h1> Records </h1> </center>  
		<table>
		<button type="button" style="width: 109px; color: #fff;" ><a href="<?=base_url();?>add" />click me</button></a>
		<thead>
			<tr>
			<th <?php echo($sort_by == 'id' ? 'class="sort_'.$sort_order.'"' : ''); ?>>
						<?php 
                            echo anchor("home/main_page/id/" .
                                    (($sort_order == 'ASC' && $sort_by == 'id') ? 'DESC' : 'ASC'), 'ID');
                        ?>
					</th>
					<th <?php echo($sort_by == 'type' ? 'class="sort_'.$sort_order.'"' : ''); ?>>
						<?php
                            echo anchor("home/main_page/type/" .
                                    (($sort_order == 'ASC' && $sort_by == 'type') ? 'DESC' : 'ASC'), 'Type');
                        ?>
                    </th>
					<th <?php echo($sort_by == 'name' ? 'class="sort_'.$sort_order.'"' : ''); ?>>
						<?php
                            echo anchor("home/main_page/name/" .
                                    (($sort_order == 'ASC' && $sort_by == 'name') ? 'DESC' : 'ASC'), 'Name');
                        ?>
                    </th>
					<th <?php echo($sort_by == 'magento_id' ? 'class="sort_'.$sort_order.'"' : ''); ?>>
						<?php
                            echo anchor("home/main_page/magento_id/" .
                                    (($sort_order == 'ASC' && $sort_by == 'magento_id') ? 'DESC' : 'ASC'), 'Magento_id');
                        ?>
                    </th>
				<!--<th>ID</th>
				<th>Type</th>
				<th>Name</th>
				<th>Magento ID</th>-->
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
		<?php if(!empty($_RecordData)){
			$_Index	=	0;
		foreach($_RecordData as $_Record){
			$_Index +=1; 
			?>
			<tr>
				<td><?php echo $_Index;?></td>
				<td><?=$_Record['type'];?></td>
				<td><?=$_Record['name'];?></td>
				<td><?=$_Record['magento_id'];?></td>
				<td>
				<a href="<?php echo base_url();?>add/<?php echo $_Record['id'];?>"> Edit </a>&nbsp;&nbsp; 
				<a href="<?php echo base_url();?>home/delete/<?php echo $_Record['id'];?>"> Delete </a>
				</td> 
			</tr>
		<?php } 
		} ?>
		</tbody>
		</table>
</body>   
</html>
<?php ?>