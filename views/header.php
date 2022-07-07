<?php
	//xem chi tiet ung dung
	if(isset($_GET['detail']) && $_GET['detail']!=''){
		$_SESSION['appId'] = $_GET['detail'];
		header('Location:index.php?act=detail');	
	}
	//xem chi tiet the loai
	if(isset($_GET['category']) && $_GET['category']!=''){
		$_SESSION['catId'] = $_GET['category'];
		header('Location:index.php?act=category');	
	}

	//chinh sua thong tin nguoi dung
	if(isset($_GET['update']) && $_GET['update'] !=''){
		$_SESSION['update'] = $_GET['update'];
		header('Location:index.php?act=update');
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Google Store</title>
	<link rel="stylesheet" href="style.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
	<script type="text/javascript" src="main.js"></script>
<body>
	<div class="wrapper"> <!-- bắt đầu thân trang -->
	<!-- tạo một cái header -->
<header> 
	<div class="header-all">
	<div class="main-header">
		<!-- logo -->
		<div class="header-left">
			<div class="logo">
				<a href="/"><img src="img/logo.png"></a>
			</div>
			
		</div>
		<div class="header-middle">
			<div class="header-middle-search">
				<form method="GET">
					<input type="text" name="searchvalue" class="search-input">
					<input type="hidden" value="search" name="act">
					<button type="submit">Search</button>
				</form>
				
			</div>
		</div><img src="">
		<div class="header-right">
				<?php
				if(isset($_SESSION['fullName'])){
					$name = $_SESSION['fullName'];
					$avt = $_SESSION['userImg'];?>
					<a onclick="load_web('/index.php?act=personal')" class="header-right-avt"><img src=/avatar/<?=$avt?>></a>

					<p><?= $name ?></p>
					<button onclick="load_web('/index.php?act=logout')">Log out</button>
				<?php }
				else { ?>
				<button onclick="load_web('/index.php?act=register')">Register</button>
				<button onclick="load_web('/index.php?act=login')">Login</button>
				<?php }
			?>
		</div>

		</div>
		<div class="header-bot">
			<div class="header-bot-left"></div>
			<div class="header-bot-mid">
				<div class="header-bot-menu">
					<div class="header-bot-menu-drop">
						<button><h2>Category</h2></button>
						<div class="btn-list-cat">						
					<?php
						foreach ($crt->catelog($conn) as $c) { ?>
							
								<div class="list-cat">
									<a href="?category=<?= $c['catId']?>">
										<h3><?= $c['catName'] ?></h3>
									</a>
								</div>
							
						<?php } ?>
					</div>
					</div>
				</div>
				<div class="header-bot-menu"><a href="/"><button><h2>Home</h2></button></a></div>
				<div class="header-bot-menu"><a href="?act=downloaded"><button><h2>Most downloaded apps</h2></button></a></div>
				<div class="header-bot-menu"><a href="?act=purchased"><button><h2>Most purchased apps</h2></button></a></div>
			</div>
			<div class="header-bot-right"></div>
		</div>
		</div>
		
	
</header>
<div class="content-all">