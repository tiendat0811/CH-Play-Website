<?php
	unset($_SESSION['fullName']);
	unset($_SESSION['userId']);
	unset($_SESSION['level']);
	unset($_SESSION['userImg']);
	header('Location:index.php');
?>