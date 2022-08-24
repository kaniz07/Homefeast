

 <?php
	session_start();
	require_once '../config/connect.php';
	if(!isset($_SESSION['email']) & empty($_SESSION['email'])){
		header('location: login.php');
	}
?>
 
 
 
 <?php
include ('inc/header.php');?>
<?php include ('inc/nav.php');
?>


	
<section id="content">
	<div class="content-blog">
		<div class="container">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>#</th>
						<th>Category Name</th>
						<th>Operations</th>
					</tr>
				</thead>
				<tbody>
				<tr>
					<th scope ="row">S.NO</th>
					<td>Category Name</td>
					<td><a href="#">Edit</a> | <a href="#">Delete</a></td>
</tr>
				</tbody>
			</table>
			
		</div>
	</div>

</section>
	
	<div class="clearfix space70"></div>
	
</div>


<?php

include 'inc/footer.php';

?>

