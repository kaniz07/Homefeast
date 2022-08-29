<?php
	session_start();
	require_once '../config/connect.php';
	if(!isset($_SESSION['email']) & empty($_SESSION['email'])){
		header('location: login.php');
	}


?>

<?php
include('inc/header.php');
include('inc/nav.php')
?>


<section id="content">
	<div class="content-blog">
		<div class="container">
			<form method="post">
			  <div class="form-group">
			    <label for="Productname">Item Name</label>
			    <input type="text" class="form-control" name="productname" id="Productname" placeholder="Item Name">
			  </div>
			  <div class="form-group">
			    <label for="productdescription">Item Description</label>
			    <textarea class="form-control" name="productdescription" rows="3"></textarea>
			  </div>

			  <div class="form-group">
			    <label for="productcategory">Item Category</label>
			    <select class="form-control" id="productcategory" name="productcategory">
				  <option value="">---SELECT CATEGORY---</option>
				</select>
			  </div>
			  

			  <div class="form-group">
			    <label for="productprice"> Price</label>
			    <input type="text" class="form-control" name="productprice" id="productprice" placeholder=" Price">
			  </div>
			  <div class="form-group">
			    <label for="productimage"> Image</label>
			    <input type="file" name="productimage" id="productimage">
			    <p class="help-block">Only jpg/png are allowed.</p>
			  </div>
			  
			  <button type="submit" class="btn btn-default">Submit</button>
			</form>
			
		</div>
	</div>

</section>
	
	<div class="clearfix space70"></div>
	
</div>

</body>
<?php

include('inc/footer.php')

?>

</html>