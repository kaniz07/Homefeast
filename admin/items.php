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

<section id ="content">
	<div class="content-blog">
		<div class="container">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>#</th>
						<th>Item name</th>
						<th>Category name</th>
						<th>Thumbnail</th>
						<th>Operations</th>
</tr>
</thead>
<tbody>
	<tr>
		<th scope="row">S.No</th>
		<td>Item name</td>
		<td>Category name</td>
		<td>Yes/No</td>
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

include('inc/footer.php')

?>
