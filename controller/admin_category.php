<?php
	include_once './views/admin_category.php';
?>
<?php
	if(isset($_POST['deleteCat'])){
		$catId = $_POST['catDel'];
		$delCat = $crt->delete_cat($conn, $catId);
	}
	if(isset($_POST['editCat'])){
		$catId = $_POST['catEdit'];
		$new = $_POST['newCatName'];
		$editCat = $crt->edit_cat($conn, $catId, $new);
	}
	if(isset($_POST['addCat'])){
		$new = $_POST['catName'];
		$addCat = $crt->add_cat($conn, $new);
	}
?>