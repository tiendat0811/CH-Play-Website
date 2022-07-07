<?php
	include_once('./views/update.php');
?>
<?php
	if(isset($_POST['update'])){
		//include_once('./views/update.php');
		$new = $_POST['updatevalue'];
		$col = $_SESSION['update'];
		$update = $crt->update_user($conn, $col, $new);
	}	
?>
