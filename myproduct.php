<?php
  require("connectivity.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>My Products</title>
	<link rel="stylesheet" type="text/css" href="css/change_pass.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/Home.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <style>
    .active{
    background-color:#CA226B;
    }
    
    
     background-color:#CA226B;
    }
    table{  
      border: none;
      text-align: left;
    }

    table {
      border-collapse: collapse;
      width: 100%;
    }

     td {
      padding: 30px;
      border : none;
    }
    
    .setbuyer{
        background-color : #CA226B;
        color: black;
        border: none;
        padding: 7px 10px;
	margin: 8px 0;
        font-weight: 500px;
        font-family: Times New Roman;
        font-size: 15px;
    } 
    .setbuyer:hover {
      background-color: #F778A1;
      text-decoration: none;
    }
    </style>
    
</head>

<body >

	<span><h1 align="right"><font style="CG Omega">CartMyCarton</font><img src="images/logomin2.png" align="right"></h1></span>
    <div class="header" id="myHeader">
    <div class="navbar">
        <a  href="home.php"><i class="fa fa-fw fa-home"></i> Home</a>
        <a class="active" href="myproduct.php"><i class="fa fa-fw fa-cart-plus"></i> My Products</a>
        <a  href="my_orders.php"><i class="fa fa-fw fa-cart-arrow-down"></i> My Orders</a>
       <a   href="change_password.php" ><i class="fa fa-fw fa-lock"></i> Change Password</a>
        <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Logout</a>
    	 <a href="home.php" style="margin-right:100px;"><i class="fa fa-fw fa-user"></i> <u><?php echo $_SESSION['register_no']; ?></u></a>	
    		
</div>
    </div>
    
    <table>
 <?php
    $user_num = $_SESSION['register_no'];
$query = "SELECT * FROM products where owner_regno= '$user_num'";
$result = mysqli_query($db,$query);
if(mysqli_num_rows($result) == 0){
  echo "<script type='text/javascript'>alert('You have not advertised any item')</script>";
}

while ($row = mysqli_fetch_assoc($result)) {
    
    $id = $row["product_id"];
    $buyer = $row["buyer_regno"];
    
        $query2 = "SELECT * FROM Users WHERE Registration_No = '$buyer'";
    	$result2 = mysqli_query($db,$query2);
    	$row2 = mysqli_fetch_assoc($result2);
        $email = $row2["Email_id"];
        $mobile = $row2["Mobile_no"];
        $name = $row2["User_name"];
        $regno = $row2["Registration_No"];
    
    if ($row["product_type"]==="Cooler") {
      $query3 = "SELECT * FROM cooler WHERE cooler_id = '$id'";
      $result3 = mysqli_query($db,$query3);
      $row3 = mysqli_fetch_assoc($result3);
         $image_name = $row3["image_path"];
    if($buyer===NULL){
        
?>

                <tr align="center">
                        <td align="left"><?php echo "<img src='images/$image_name' style='width:400px;height:300px;'>";?></td>
                        <td align="left">
                        <h2><u>Not Sold Yet</u></h2>
                        <p><h4><b>Product Id : <?php echo $id; ?></b></h4></p>
                        <p><h4><b>Expected Amount : &#8377;<?php echo $row3["amount"]; ?></b></h4></p>
<?php
}
        else{
            
?>

       
                    <tr align="center">
                        <td align="left"><?php echo "<img src='images/$image_name' style='width:400px;height:300px;'>";?></td>
                        <td align="left">
                        <p><h4><b>Product Id : <?php echo $id; ?></b></h4></p>
                        <h2><u>Buyer Details</u></h2>
                        <p>Prodct Name: <b><?php echo $row["product_type"]; ?> </b></p>
                            <p>Registration Number : <b><?php echo $buyer; ?></b></p>
                             <p>Name : <b><?php echo $name; ?></b></p>
                                <p>Mobile Number : <b><?php echo $mobile; ?></b></p>
                                <p>Email Id : <b><?php echo $email; ?></b></p>
                                
                
        <?php
            }
            }
            else if ($row["product_type"]==="Kettle") {
            $query2 = "SELECT * FROM kettle WHERE kettle_id = '$id'";
            $result2 = mysqli_query($db,$query2);
            $row3 = mysqli_fetch_assoc($result2);
         $image_name = $row3["image_path"];
         if($buyer===NULL)
         {

       ?>
       
         <tr align="center">
                        <td align="left"><?php echo "<img src='images/$image_name' style='width:400px;height:300px;'>";?></td>
                        <td align="left">
                        <h2><u>Not Sold Yet</u></h2>
                        <p><h4><b>Product Id : <?php echo $id; ?></b></h4></p>
                        <p><h4><b>Expected Amount : &#8377;<?php echo $row3["amount"]; ?></b></h4></p>
            <?php
            }
                    else{
                        
            ?>
                   
                        <tr align="center">
                        <td align="left"><?php echo "<img src='images/$image_name' style='width:400px;height:300px;'>";?></td>
                        <td align="left">
                        <p><h4><b>Product Id : <?php echo $id; ?></b></h4></p>
                           <h2><u>Buyer Details</u></h2>
                        <p>Prodct Name: <b><?php echo $row["product_type"]; ?> </b></p>
                            <p>Registration Number : <b><?php echo $buyer; ?></b></p>
                             <p>Name : <b><?php echo $name; ?></b></p>
                                <p>Mobile Number : <b><?php echo $mobile; ?></b></p>
                                <p>Email Id : <b><?php echo $email; ?></b></p>
                            
        <?php
        }
          }
            else if ($row["product_type"]==="Table") {
            $query2 = "SELECT * FROM studytable WHERE table_id = '$id'";
            $result2 = mysqli_query($db,$query2);
            $row3 = mysqli_fetch_assoc($result2);
             $image_name = $row3["image_path"];

         if($buyer===NULL){  
       ?>
       
          <tr align="center">
                        <td align="left"><?php echo "<img src='images/$image_name' style='width:400px;height:300px;'>";?></td>
                        <td align="left">
                        <h2><u>Not Sold Yet</u></h2>
                        <p><h4><b>Product Id : <?php echo $id; ?></b></h4></p>
                        <p><h4><b>Expected Amount : &#8377;<?php echo $row3["amount"]; ?></b></h4></p>
                <?php
                }
                        else{
                            
                ?>
                          <tr align="center">
                                <td align="left"><?php echo "<img src='images/$image_name' style='width:400px;height:300px;'>";?></td>
                                <td align="left">
                                <p><h4><b>Product Id : <?php echo $id; ?></b></h4></p>
                                   <h2><u>Buyer Details</u></h2>
                        <p>Prodct Name: <b><?php echo $row["product_type"]; ?> </b></p>
                            <p>Registration Number : <b><?php echo $buyer; ?></b></p>
                             <p>Name : <b><?php echo $name; ?></b></p>
                                <p>Mobile Number : <b><?php echo $mobile; ?></b></p>
                                <p>Email Id : <b><?php echo $email; ?></b></p>
    
        <?php
                }
           }     
            else if ($row["product_type"]==="Cycle") {
            $query2 = "SELECT * FROM cycle WHERE cycle_id = '$id'";
            $result2 = mysqli_query($db,$query2);
            $row3 = mysqli_fetch_assoc($result2);
             $image_name = $row3["image_path"];
                if($buyer===NULL){
           
       ?>
       
         <tr align="center">
                        <td align="left"><?php echo "<img src='images/$image_name' style='width:400px;height:300px;'>";?></td>
                        <td align="left">
                        <h2><u>Not Sold Yet</u></h2>
                        <p><h4><b>Product Id : <?php echo $id; ?></b></h4></p>
                        <p><h4><b>Expected Amount : &#8377;<?php echo $row3["amount"]; ?></b></h4></p>
<?php
}
        else{
            
?>
       
                    <tr align="center">
                            <td align="left"><?php echo "<img src='images/$image_name' style='width:400px;height:300px;'>";?></td>
                            <td align="left">
                            <p><h4><b>Product Id : <?php echo $id; ?></b></h4></p>
                                <h2><u>Buyer Details</u></h2>
                        <p>Prodct Name: <b><?php echo $row["product_type"]; ?> </b></p>
                            <p>Registration Number : <b><?php echo $buyer; ?></b></p>
                             <p>Name : <b><?php echo $name; ?></b></p>
                                <p>Mobile Number : <b><?php echo $mobile; ?></b></p>
                                <p>Email Id : <b><?php echo $email; ?></b></p>
<?php
}}

            else if ($row["product_type"]==="Bedroll") {
            $query2 = "SELECT * FROM bedroll WHERE bed_id  = '$id'";
            $result2 = mysqli_query($db,$query2);
            $row3 = mysqli_fetch_assoc($result2);
         $image_name = $row3["image_path"];
        if($buyer===NULL)
        {
       ?>
         <tr align="center">
                        <td align="left"><?php echo "<img src='images/$image_name' style='width:400px;height:300px;'>";?></td>
                        <td align="left">
                        <h2><u>Not Sold Yet</u></h2>
                        <p><h4><b>Product Id : <?php echo $id; ?></b></h4></p>
                        <p><h4><b>Expected Amount : &#8377;<?php echo $row3["amount"]; ?></b></h4></p>
<?php
}
        else{
            
?>
       
       
                                <tr align="center">
                <td align="left"><?php echo "<img src='images/$image_name' style='width:400px;height:300px;'>";?></td>
                <td align="left">
                <p><h4><b>Product Id : <?php echo $id; ?></b></h4></p>
                   <h2><u>Buyer Details</u></h2>
                        <p>Prodct Name: <b><?php echo $row["product_type"]; ?> </b></p>
                            <p>Registration Number : <b><?php echo $buyer; ?></b></p>
                             <p>Name : <b><?php echo $name; ?></b></p>
                                <p>Mobile Number : <b><?php echo $mobile; ?></b></p>
                                <p>Email Id : <b><?php echo $email; ?></b></p>
<?php
} }      
?> 
        
                                 
                                           </td></tr>
<?php
}
?> 

                   
 </table>   
 <a href="set_buyer.php"><center><button style="width: 50%;" type="submit" id="sold" name="sold" class="setbuyer">CLICK TO ADD SOLD ITEMS</button></center></a>	
 <br>	
 <br>
 <br><br><br>
  
      <footer class="container-fluid bg-4 " style="background:#FFE4E1;">
         <p ><center>For more queries, email us at: <a href="mailto: cartmycarton001@gmail.com" target="_blank">cartmycarton001@gmail.com</a></center></p>
               <p><center>Contact Us: +919958192532 , +918860588687</center></p>
     
      </footer>
</body>
</html>
    
    
    