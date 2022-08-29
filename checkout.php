<?php
session_start();
require_once 'config/connect.php';
if(!isset($_SESSION['customer']) & empty($_SESSION['customer'])){
	header('location: login.php');
}
include('inc/header.php');
include('inc/nav.php');

if(isset($_POST) & !empty($_POST)){
	if($_POST['agree'] ==true){
	$country = $_POST['country'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$company = $_POST['company'];
	$address1 = $_POST['address1'];
	$address2 = $_POST['address2'];
	$city = $_POST['city'];
	$area = $_POST['area'];
	$zipcode = $_POST['zipcode'];
	$phone = $_POST['phone'];
	$payment = $_POST['payment'];
	$userid= $_SESSION['customerid'];

	$sql = "SELECT * FROM usersmeta WHERE userid=$userid";
	$result = mysqli_query($connection, $sql);
	$count= mysqli_num_rows($result);
	if($count ==1){
		//update data in usersmeta
		echo $usql= " UPDATE usersmeta SET country='$country', firstname='$firstname', lastname='$lastname',
		address1='$address1', address2='$address2', city='$city', area='$area', zipcode='$zipcode' WHERE userid=$userid";
		$uresult= mysqli_query($connection,$usql)or die (mysqli_error($connection));
		if($uresult) {
			echo "Update orders into order table & order items table-uresult";
		}
	}else {
		//insert data in usersmeta
		echo $isql= "INSERT INTO usersmeta (country, firstname, lastname, address1, address2, city, area,zipcode) 
		VALUES ('$country', '$firstname','$lastname','$address1','$address2','$city','$area','$zipcode')";
		$iresult= mysqli_query($connection,$isql) or die (mysqli_error($connection));
		if($iresult) {
			echo "Insert orders into order table & order items table-iresult";
	}

}
}
}

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
									<input name="lastname" class="form-control" placeholder="" value="" type="text">
								</div>
							</div>
							<div class="clearfix space20"></div>
							<label>Company Name</label>
							<input name="company"  class="form-control" placeholder="" value="" type="text">
							<div class="clearfix space20"></div>
							<label>Address </label>
							<input name="address1" class="form-control" placeholder="Street address" value="" type="text">
							<div class="clearfix space20"></div>
							<input name="address2"  class="form-control" placeholder="Apartment, suite, unit etc. (optional)" value="" type="text">
							<div class="clearfix space20"></div>
							<div class="row">
								<div class="col-md-4">
									<label> City </label>
									<input name="city"  class="form-control" placeholder="City" value="" type="text">
								</div>
								<div class="col-md-4">
									<label>Area</label>
									<input name="area"  class="form-control" value="" placeholder="area" type="text">
								</div>
								<div class="col-md-4">
									<label>Postcode </label>
									<input name="zipcode" class="form-control" placeholder=" Zip" value="" type="text">
								</div>
							</div>
							
							<div class="clearfix space20"></div>
							<label>Phone </label>
							<input name="phone"  class="form-control" id="billing_phone" placeholder="" value="" type="text">
					
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