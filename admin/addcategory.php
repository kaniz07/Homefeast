<?php
	session_start();
	require_once '../config/connect.php';
	if(!isset($_SESSION['email']) & empty($_SESSION['email'])){
		header('location: login.php');
	}
?>

<?php include 'inc/header.php' ;?>
<?php include 'inc/nav.php';?>

<section id="content">
	<div class="content-blog">
		<div class="container">
			<form method="post">
				<div class="form-group">
					<label for="itemname">Category Name</label>
					<input type="text" class="form-control" name="categoryname" id="categoryname" placeholder="category name">
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