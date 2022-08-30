<?php
session_start();
require_once 'config/connect.php';
if(!isset($_SESSION['customer']) & empty($_SESSION['customer'])){
	header('location: login.php');
}
include('inc/header.php');
include('inc/nav.php');
$userid= $_SESSION['customerid'];

if(isset($_POST) & !empty($_POST)){
	if($_POST['agree'] ==true){
	$country = filter_var($_POST['country'],FILTER_SANITIZE_STRING );
	$firstname = filter_var($_POST['firstname'],FILTER_SANITIZE_STRING);
	$lastname = filter_var($_POST['lastname'],FILTER_SANITIZE_STRING);
	$company = filter_var($_POST['company'],FILTER_SANITIZE_STRING);
	$address1 = filter_var($_POST['address1'],FILTER_SANITIZE_STRING);
	$address2 = filter_var($_POST['address2'],FILTER_SANITIZE_STRING);
	$city = filter_var($_POST['city'],FILTER_SANITIZE_STRING);
	$zip = filter_var($_POST['zipcode'],FILTER_SANITIZE_NUMBER_INT);
	$mobile = filter_var($_POST['mobile'],FILTER_SANITIZE_NUMBER_INT);
	$payment = filter_var($_POST['payment'],FILTER_SANITIZE_STRING);
	

	$sql = "SELECT * FROM usersmeta WHERE userid=$userid";
	$result = mysqli_query($connection, $sql);
	$r= mysqli_fetch_assoc($result);
	$count= mysqli_num_rows($result);
	if($count ==1){
		//update data in usersmeta
		 $usql= " UPDATE usersmeta SET country='$country', firstname='$firstname', lastname='$lastname',company='$company',
		address1='$address1', address2='$address2', city='$city',  zip='$zip',mobile='$mobile' WHERE userid=$userid";
		$uresult= mysqli_query($connection,$usql)or die (mysqli_error($connection));
		if($uresult) {
			 //"Update orders into order table & order items table-uresult";
		}
	}else {
		//insert data in usersmeta
		$isql= "INSERT INTO usersmeta (country, firstname, lastname,company, address1, address2, city, zip,mobile,userid) 
		VALUES ('$country', '$firstname','$lastname','$company','$address1','$address2','$city','$zip', '$mobile','$userid')";
		$iresult= mysqli_query($connection,$isql) or die (mysqli_error($connection));
		if($iresult) {
			// "Insert orders into order table & order items table-iresult";
	}

}
}
}
$sql = "SELECT * FROM usersmeta WHERE userid=$userid";
$result = mysqli_query($connection, $sql);
$r= mysqli_fetch_assoc($result);


?>

	
	<!-- SHOP CONTENT -->
	<section id="content">
		<div class="content-blog">
					<div class="page_header text-center">
						<h2>Checkout</h2>
						<p></p>
					</div>

<form method="post">
<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<div class="billing-details">
						<h3 class="uppercase">Billing Details</h3>
						<div class="space30"></div>
						
							<label class="">Country </label>
							<select name="country" class="form-control">
								<option value="">Select Country</option>
								<option value="AX">Aland Islands</option>
								<option value="AF">Afghanistan</option>
								<option value="AL">Albania</option>
								<option value="DZ">Algeria</option>
								<option value="AD">Andorra</option>
								<option value="AO">Angola</option>
								<option value="AI">Anguilla</option>
								<option value="AQ">Antarctica</option>
								<option value="AG">Antigua and Barbuda</option>
								<option value="AR">Argentina</option>
								<option value="AM">Armenia</option>
								<option value="AW">Aruba</option>
								<option value="AU">Australia</option>
								<option value="AT">Austria</option>
								<option value="AZ">Azerbaijan</option>
								<option value="BS">Bahamas</option>
								<option value="BH">Bahrain</option>
								<option value="BD">Bangladesh</option>
								<option value="BB">Barbados</option>
							</select>
							<div class="clearfix space20"></div>
							<div class="row">
								<div class="col-md-6">
									<label>First Name </label>
									<input name="firstname" class="form-control" placeholder="" value="" type="text">
								</div>
								<div class="col-md-6">
									<label>Last Name </label>
									<input name="lastname" class="form-control" placeholder="" value="
									" type="text">
								</div>
							</div>
							<div class="clearfix space20"></div>
							<label>Company Name</label>
							<input name="company"  class="form-control" placeholder="" value="
							" type="text">
							<div class="clearfix space20"></div>
							<label>Address </label>
							<input name="address1" class="form-control" placeholder="Street address" value="
							" type="text">
							<div class="clearfix space20"></div>
							<input name="address2"  class="form-control" placeholder="Apartment, suite, unit etc. (optional)" value="" type="text">
							<div class="clearfix space20"></div>
							<div class="row">
								<div class="col-md-4">
									<label> City </label>
									<input name="city"  class="form-control" placeholder="City" value="
									" type="text">
								</div>
								
								<div class="col-md-4">
									<label>Zipcode </label>
									<input name="zipcode" class="form-control" placeholder=" zip" value="
								" type="text">
								</div>
							</div>
							
							<div class="clearfix space20"></div>
							<label>Mobile </label>
							<input name="mobile"  class="form-control" id="mobile" placeholder="" value="
							" type="text">
					
					</div>
				</div>
				
			</div>
			
			<div class="space30"></div>
			<h4 class="heading">Your order</h4>
			
			<table class="table table-bordered extra-padding">
				<tbody>
					<tr>
						<th>Cart Subtotal</th>
						<td><span class="amount">demo price</span></td>
					</tr>
					<tr>
						
						
					</tr>
					<tr>
						<th>Order Total</th>
						<td><strong><span class="amount">demo price</span></strong> </td>
					</tr>
				</tbody>
			</table>
			
			<div class="clearfix space30"></div>
			<h4 class="heading">Payment Method</h4>
			<div class="clearfix space20"></div>
			
			<div class="payment-method">
				<div class="row">
					
						<div class="col-md-4">
							<input name="payment" id="radio1" class="css-checkbox" type="radio" value="code" >
							<span>Cash On Delivery</span>
							<div class="space20"></div>
							<p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won't be shipped until the funds have cleared in our account.</p>
						</div>
						<div class="col-md-4">
							<input name="payment" id="radio2" class="css-checkbox" type="radio">
							<span value="cheque" >Cheque Payment</span>
							<div class="space20"></div>
							<p>Please send your cheque to BLVCK Fashion House, Oatland Rood, UK, LS71JR</p>
						</div>
						<div class="col-md-4">
							<input name="payment" id="radio3" class="css-checkbox" type="radio">
							<span value="paypal">Paypal</span>
							<div class="space20"></div>
							<p>Pay via PayPal; you can pay with your credit card if you don't have a PayPal account</p>
						</div>
					
				</div>
				<div class="space30"></div>
			
					<input name="agree" id="checkboxG2" class="css-checkbox" type="checkbox" value="true" >
					<span>I've read and accept the <a href="#">terms &amp; conditions</a></span>
			
				<div class="space30"></div>
				<input type="submit" class="button btn-lg"value="Pay Now">
			</div>
		</div>		
</form>
		</div>
	</section>
	
	<div class="clearfix space70"></div>
    <?php

include('inc/footer.php')

?>