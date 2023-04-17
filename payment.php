<?php
   include_once('./includes/headerNav.php');
   include_once('./stripeConfig.php');
   //this restriction will secure the pages path injection
   if(!(isset($_SESSION['id']))){
      header("location:signup.php?msg=CreateAccountBeforePurchase");
     }
     ?>
     <head>
        <style>
           .proceed-pay{
              font-size:medium;
              height:400px;
              display:flex;
              justify-content:center;
              align-items:center;
              border:none;
              background:aliceblue;
              box-shadow: 2px 2px 2px 1px rgba(0, 0, 0, 0.2);
              
           }
           .thumbnail{
              cursor:pointer;
           }
           .ship{
               margin-right:5%;
               color:lime
           }
           .order{
               margin-left:5%;
               color:violet
           }
           h4{
              text-decoration:underline;
              color:black
           }
           .btn-pay{
              height:30px;
              color:white
           }
           .btn-pay:hover{
              border-radius:0px;
              color:wheat;
           }
           button{
              font-family:monospace
           }
        </style>
     </head>

     <?php

$sql ="SELECT * FROM  products WHERE product_id='{$_GET['id']}';";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$conn->close();
?>

<h4 style="text-align:center;"><p><a style="color:grey" href="./product.php?id=<?php echo $_GET['id']?>"> Product:<?php echo $row['product_title'] ?></a></p></h4>


     <div class="proceed-pay">

        <div class="ship">
        <h4>Shipping address</h4>
        <p>Name:<?Php echo $_SESSION['customer_name']?></p>
        <p>Address:<?Php echo $_SESSION['customer_address']?></p>
        <p>Number:<?Php echo $_SESSION['customer_phone']?></p>
        <p>Email:<?Php echo $_SESSION['customer_email']?></p>
        <a href="./profile.php"><h5 style="text-decoration:underline;">Edit profile</h5></a>
        </div>
       
  
<div class="order">
<h4>Order summary</h4>
        <p>subtotal( item)</p>
        <p>shipping_fees: Rs 50</p>

   
      <label for=""> <i style=" text-decoration:underline;"> voucher code</i></label>  <input type="text" placeholder="Insert code" name="code" required>
        <p>Total: Rs <?php echo $row['product_price']?>+50 = <?php echo $row['product_price']+50 ?> </p>
        <?php
require('stripeConfig.php');
?>
<form action="message.php" method="post">
	<script
		src="https://checkout.stripe.com/checkout.js" class="stripe-button"
		data-key="<?php echo $publishableKey?>"
		data-amount="<?php echo ($row['product_price']+50) ?>"
		data-name="Electric-Shop"
		data-description="Your Choice Our Voice"
		data-image="./logo1.png"
		data-currency="usd"
		data-email="<?Php echo $_SESSION['customer_email']?>"
	>
	</script>

</form>


</div>


     </div>

     	<div class="thumbnail">
				<img src="images/payment_methods.png" title="Bootshop Payment Methods" alt="Payments Methods">
				<div class="caption">
				  <h5>Payment Methods</h5>
				</div>
			  </div>
