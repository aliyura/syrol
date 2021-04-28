<?php
session_start();
include('include/config.php');

if(isset($_POST["course_id"]))  
 {  
      $uidd = $_POST["course_id"];
      $output = ''; 
      $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">
		   <tr>
				<th>#</th>
				<th>Name</th>
				<th width="50">Email - Contact no</th>
				<th>Product </th>
				<th>Qty </th>
				<th>Amount </th>
				<th>Order Date</th>
			</tr>';
	  $from=date('Y-m-d');
	  $query=mysqli_query($con,"select users.fname as userfname,users.lname as userlname,users.email as useremail,users.contactno as usercontact,users.shippingAddress as shippingaddress,users.shippingCity as shippingcity,users.shippingState as shippingstate,users.shippingPincode as shippingpincode,products.productName as productname,orders.quantity as quantity,orders.orderDate as orderdate,products.productPrice as productprice,orders.id as id  from orders join users on orders.userId=users.id join products on products.id=orders.productId WHERE orders.userId = '$uidd' AND orders.orderDate < '$from'"); 
	  $cnt=1;
	  while($row=mysqli_fetch_assoc($query))
      {  
           $output .= '  
                <tr>
					<td>'.htmlentities($cnt).'</td>
					<td>'.htmlentities($row['userfname']).' '.htmlentities($row['userlname']).'</td>
					<td>'.htmlentities($row['useremail']).' -'.htmlentities($row['usercontact']).'</td>
					<td>'.htmlentities($row['productname']).'</td>
					<td>'.htmlentities($row['quantity']).'</td>
					<td>'.htmlentities($row['quantity']*$row['productprice']).'</td>
					<td>'.htmlentities($row['orderdate']).'</td>
					</td>
				</tr>  
                ';  
				$cnt=$cnt+1;
      }  
      $output .= "</table></div>";  
      echo $output;  
 }  
?>