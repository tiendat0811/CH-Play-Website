<div class="search-view">
<div class="apps5">
<?php 
	if(isset($_GET['searchvalue']) && $_GET['searchvalue']!=''){
		$str = $_GET['searchvalue'];
		$search_app = $crt->search_app($conn,$str);
		if(count($search_app) < 1){
			echo "App not exist!";
		}
		else{
			$count = 0;
			foreach($search_app as $key => $a){ ?>
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
			<?php
				}		
			}
		}
	}
?>
</div>
</div>