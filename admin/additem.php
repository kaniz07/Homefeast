<?php
	session_start();
	include('../config/connect.php');
	if(!isset($_SESSION['email']) & empty($_SESSION['email'])){
		header('location: login.php');
	}
	if(isset($_POST)  & !empty($_POST)){
		$foodname = mysqli_real_escape_string($connection, $_POST['itemname']);
		$category = mysqli_real_escape_string($connection, $_POST['itemcategory']);
		$price = mysqli_real_escape_string($connection, $_POST['price']);
		$food_description = mysqli_real_escape_string($connection, $_POST['itemdescription']);
	
		

if(isset($_FILES)  & !empty($_FILES)){
	$name=$_FILES['productimage'] ['name'];
	$size=$_FILES['productimage'] ['size'];
	$type=$_FILES['productimage'] ['type'];
	$tmp_name=$_FILES['productimage'] ['tmp_name'];

	$max_size= 1000000;
	$extension = substr($name, strpos($name,'.') + 1);

	if (isset($name)  & !empty($name)){
		if(($extension == 'jpg' || $extension == 'jpeg') & type == 'image/jpeg' & $size<=$max_size){
			$location = 'uploads/';
			if(move_uploaded_file($tmp_name, $location.$name)){
				echo "uploaded successfully";
			} else {
				echo "failed to upload";
			}
		}else {
			echo "only jpg files are allowed and should be less than 1MB";
		}
		}else {
			echo "Please select a file";
		}
	}
}



		$sql ="INSERT INTO item (foodname, categoryid, price, food_description) VALUES ('$foodname', '$category', '$price', '$food_description')";
		$res = mysqli_query($connection, $sql);
		if($res) {
			echo "item created";
		}else{
			echo "failed";
		}
	


?>

<?php
include('inc/header.php');
include('inc/nav.php')
?>


<section id="content">
	<div class="content-blog">
		<div class="container">
			<form method="POST">
			  <div class="form-group">
			    <label for="itemname">Item Name</label>
			    <input type="text" class="form-control" name="itemname" id="itemname" placeholder="Item Name">
			  </div>

			  <div class="form-group">
			    <label for="itemcategory">Item Category</label>
			    <select class="form-control" id="itemcategory" name="itemcategory">
				  <option value="">---SELECT CATEGORY---</option>
				  <?php 
					$sql = "SELECT * FROM category";
					$res = mysqli_query($connection, $sql);
					while ($r = mysqli_fetch_assoc($res)){
						?>
						<option value="<?php echo $r['id']; ?>"><?php echo $r['name'];?></option>
					<?php } ?>
				</select>
			  </div>

			  <div class="form-group">
			    <label for="price"> Price</label>
			    <input type="text" class="form-control" name="price" id="price" placeholder=" Price">
			  </div>

			  <div class="form-group">
			    <label for="itemdescription">Item Description</label>
			    <textarea class="form-control" name="itemdescription" rows="3"></textarea>
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