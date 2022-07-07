<div class="admin_overall">
	<div class="admin_overall-top">
		<div><h1>Overall of store</h1></div>
	</div>
	<div class="admin_overall-mid">
		<div class="admin_overall-mid-top">
			<?php 
					$sum_user = $crt->get_sum_user($conn);
					$sum_app = $crt->get_sum_app($conn);
			?>
			
			<div class="aomt-col-1">			
					<h3>Total number of user: <?= $sum_user?></h3>
								
					<h3>Total number of application: <?= $sum_app?></h3>
			</div>
			<div class="aomt-col-2">
				<div>
					<a href="?act=downloaded"><button>Most downloaded apps</button></a>
				</div>
				<div>
					<a href="?act=purchased"><button>Most purchased apps</button></a>
				</div>
			</div>
		</div>

		<div class="admin_overall-mid-bot">
			<div class="aom">
				<div class="aom-top">
					<div class="aom-top-col-1"><h3>Category</h3></div>
					<div class="aom-top-col-2"><h3>Number of applications</h3></div>
				</div>		
					<?php 
						foreach($crt->catelog($conn) as $c){
							$sum = $crt->get_sum_app_by_cat($conn, $c['catId']);
							$catName = $c['catName']; ?>
					<div class="aom-bot">
						<div class="aom-bot-col-1">
							<h3><?= $catName ?></h3>
						</div>
						<div class="aom-bot-col-2">
							<h3><?= $sum ?></h3>
						</div>
					</div>
					<?php } ?>
			</div>
		</div>
	</div>
	<div class="admin_overall-bot"></div>
</div>