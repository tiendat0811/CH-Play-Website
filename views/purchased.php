<div class="category-view">
	<div class="category-top">
		<div class="category-top-left">
			<h2>Most purchased apps</h2>
		</div>
	</div>
	<div class="category-bot">
		<div class="category-bot-list5app2">
			<div class="apps5">
			<?php
			$n = 0;
			$count = 0;
				foreach($crt->load_app_pur($conn) as $a){
					?>
					
					<div class="apps">												
						<a href="?detail=<?= $a['appId']?>">
							<img src="appimages/<?= $a['appImg']?>">
						</a>
						<h3><?= $a['appName']?></h3>
					</div>
				<?php
					$n++;
					if($n > 14)
						break; 
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