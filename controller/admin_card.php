<?php
	include_once './views/admin_card.php';
?>
<?php 
	if(isset($_POST['addCard'])){
		$num = $_POST['numCard'];
		$val = $_POST['valCard'];
		$addCard = $crt->add_card($conn, $num, $val);
	}
?>