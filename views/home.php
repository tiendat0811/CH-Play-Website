<?php

// đoạn $crt là gọi lớp ra 
// $crt->catelog là lấy cái function ra sài :d kiểu hướng đối tượng đó :D 
// còn as $c -> là gán cho biến $c trong vòng lập sẽ bằng thằng $crt->catelog :v à rui biến đếm chuẩn :v 
foreach ($crt->catelog($conn) as $c) { ?>
	<div class="category">
	<div class="category-top">
		<div class="category-top-left">
			<h2><?= $c['catName'] ?></h2>
		</div>
		<div class="category-top-right">
			<a href="?category=<?= $c['catId']?>">
				<img src="img/seemore.png">
			</a>
		</div>
	</div>
	<div class="category-bot">
		<div class="category-bot-list5app">
			<?php // bắt đầu 1 câu lệnh php <?= là echo :v  àaa :v rồi hiểu cách chưa hiểu rui :v
			// đó cứ thế vô function viết rồi gọi ra sài 
			// cái function là 1 cái sài chung thế nên để cái crt này ở public để đi đâu cũng sài được
			$count = 0;
				foreach($crt->load_app($conn,$c['catId']) as $a){
					?>
					<div class="apps">												
						<a href="?detail=<?= $a['appId']?>">
							<img src="appimages/<?= $a['appImg']?>">
						</a>
						<h3><?= $a['appName']?></h3>

					</div>
				<?php 
					$count++;
					if($count > 4)
				break;
				}
			?>
		</div>
	</div>
</div>
<?php } ?>

	
<!--xuất các app-->
