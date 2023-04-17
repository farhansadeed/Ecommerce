<?php
require('stripeConfig.php');
if(isset($_POST['stripeToken'])){
	?>

	<style>
    .mess{
        height:80%;
        display:flex;
        justify-content:center;
        align-items:center;
        flex-direction:column
    }
</style>
<div class="mess">


<h3 style="color:grey">Your delivery has been sent</h3>
<h3 style="color:lime">We are on the way, thanks</h3>
<button style="background:orange;padding:5px;text-decoration:none"><a href="index.php"><b> Go to shopping sites </b></a> </button>

</div>
<?php
}
?>