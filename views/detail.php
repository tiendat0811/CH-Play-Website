<?php  
	if(isset($_POST['comment'])){
		$cmt = $_POST['cmt'];
		//header('Location:index.php');
		$add_cmt = $crt->add_cmt($conn, $_SESSION['userId'], $_SESSION['appId'], $cmt);
	}
?>
<div class="detail">
	<div class="detail-left">
		<?php
		$appId = $_SESSION['appId'];
		$get_app = $crt->get_app($conn, $appId);
		?>
		<div class="detail-left-top">
			<div class="dlt-left">
				<div class="dlt-logo">
					<img src="./appimages/<?= $get_app['appImg'] ?>">
				</div>				
			</div>
			<div class="dlt-right">
				<div class="dlt-appname">
					<h1><?= $get_app['appName'] ?></h1>
				</div>
				<div class="dlt-appCat">
					<h3><?php
						$app_Cat = $crt->get_cat($conn, $get_app['appCat']);
						echo $app_Cat['catName'];
					?></h3>
				</div>
				<div class="dlt-ins-buy">
					<div><button>Install</button></div>
					<div><button>Buy</button></div>
				</div>	
			</div>
		</div>
		<div class="detail-left-mid">
			<div class="dlt-describe">
				<p><?= $get_app['appDes']?></p>
			</div>
		</div>
		<div class="detail-left-bot">
			<div class="detail-left-bot-cmt">
				<div class="dlb-title">
					<h3>Comments</h3>
				</div>
				<?php 
					if(isset($_SESSION['userId'])){?>
					<div class="dlb-cmt">
					<form method="POST">
						<textarea name="cmt" placeholder="Write your review about this app..."></textarea><br>
						<button type="submit" name="comment">Send</button>
					</form>
					</div>
				<?php	}
				?>
				<?php
					foreach ($crt->show_cmt($conn, $appId) as $c){
						$usercmt = $crt->get_user($conn, $c['userId']);
						?>
					<div class="cmt">
						<div class="cmt-user">
							<h4><?= $usercmt['fullName'] ?></h4>
						</div>
						<div class="cmt-content">
							<h5><?= $c['cmt'] ?></h5>
						</div>
					</div>						
					<?php }
				?>
			</div>
		</div>
		<?php  ?>
	</div>

	<div class="detail-right">
		<div class="detail-right-cat">
			<h2><?php
			$catId = $crt->get_cat($conn, $get_app['appCat']);
			$catName = $catId['catName'];?>
			<a href="?category=<?= $app_Cat['catId']?>">
							<button><?= $app_Cat['catName']?></button>
			</a></h2>
		</div>
		<div class="detail-right-app">
			<?php 
				foreach($crt->load_app($conn, $catId['catId']) as $a){ ?>
					<div class="app">												
						<a href="?detail=<?= $a['appId']?>">
							<img src="appimages/<?= $a['appImg']?>">
						</a>
						<h3><?= $a['appName']?></h3>
					</div>
				<?php }
			?>
		</div>
	</div>
</div>

