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
<?php 
					$sql = "SELECT * FROM item";
					$res = mysqli_query($connection, $sql);
					while ($r = mysqli_fetch_assoc($res)){
						?>

	<tr>
		<th scope="row"><?php echo $r['id']; ?></th>
		<td><?php echo $r['name']; ?></td>
		<td><?php echo $r['catid']; ?></td>
		<td><?php if($r['thumb']){echo "yes";}else{echo "no";} ?></td>
		<td><a href="edititem.php?id=<?php echo $r['id']; ?>">Edit</a> | <a href="deleteitem.php?id=<?php echo $r['id']; ?>">Delete</a></td>
</tr>
<?php } ?>

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
