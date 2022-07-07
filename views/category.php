<?php
	$catId = $_SESSION['catId'];
	$get_cat = $crt->get_cat($conn, $catId);
?>
	<div class="category-view">
	<div class="category-top">
		<div class="category-top-left">
			<h2><?= $get_cat['catName'] ?></h2>
		</div>
	</div>
	<div class="category-bot">
		<div class="category-bot-list5app2">
			<div class="apps5">
			<?php
			$count = 0;
				foreach($crt->load_app($conn,$get_cat['catId']) as $a){
					?>
					
					<div class="apps">												
						<a href="?detail=<?= $a['appId']?>">
							<img src="appimages/<?= $a['appImg']?>">
						</a>
						<h3><?= $a['appName']?></h3>
					</div>
				<?php 
					$count++;
					if($count > 4) {
					$count = 0; ?>
					</div>
					<div class="apps5">
					<?php } }?>					
				
		</div>
	</div>
</div>
</div>