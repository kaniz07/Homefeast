<?php
	session_start();
	require_once '../config/connect.php';
	if(!isset($_SESSION['email']) & empty($_SESSION['email'])){
		header('location: login.php');
	}
    if(isset($_GET) & !empty($_GET)){
        $id = $_GET['id'];
    }else {
        header('location: categories.php');
    }
	if(isset($_POST) & !empty($_POST)){
        $id = mysqli_real_escape_string($connection, $_POST['id']);
		$name = mysqli_real_escape_string($connection, $_POST['categoryname']);
		$sql ="UPDATE category SET name = '$name' WHERE id = $id"; 
		$res = mysqli_query($connection, $sql);
		if($res) {
			echo "category updated";
		}else{
			echo "failed";
		}
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
                    <?php 
					$sql = "SELECT * FROM category WHERE id= $id";
					$res = mysqli_query($connection, $sql);
					$r = mysqli_fetch_assoc($res);
						?>
                        <input type = "hidden" name= "id" value="<?php echo $_GET['id']; ?>">
					<input type="text" class="form-control" name="categoryname" id="categoryname" placeholder="category name" value = "<?php echo $r['name']; ?>">
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
