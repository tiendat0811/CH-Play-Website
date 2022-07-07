<div class="admin_card">
	<div class="admin_card-top">
		<div>
		<p>CARD MANAGE</p></div>
		<div>
		<form method="POST">
			<h3>Create new cards</h3>
			<input type="number" name="numCard" placeholder="Number of cards">
			<select name="valCard" required="">
				  <option value="10000">10.000 VND</option>
				  <option value="20000">20.000 VND</option>
				  <option value="50000">50.000 VND</option>
				  <option value="100000">100.000 VND</option>
				  <option value="200000">200.000 VND</option>
				  <option value="500000">500.000 VND</option>
			</select>
			<button type="submit" name="addCard">Create</button>
		</form>
		</div>
	</div>
	<div class="admin_card-mid">
		<div class="admin_card-mid-title">
			<div class="acm-col-1"><p>STT</p></div>
			<div class="acm-col-2"><p>Card Seri</p></div>
			<div class="acm-col-3"><p>Value</p></div>
			<div class="acm-col-4"><p>Status</p></div>
		</div>
		<?php
			$count = 1;
			foreach($crt->cardlog($conn) as $c){
			?>
			<div class="all-card">
				<div class="acm-col-1">
					<h4><?=$count?></h4>
				</div>
				<div class="acm-col-2">
					<h3><?= $c['cardSeri']?></h3>
				</div>
				<div class="acm-col-3">
					<h3><?= $c['cardValue']?></h3>
				</div>
				<div class="acm-col-4">
					<h3><?php
						if($c['cardStatus']==1){
							echo "Loaded";
						}
						else
							echo "Not loaded";
					?></h3>
				</div>
			</div>
			<?php 
			$count++;}
		?>

	</div>
	<div class="admin_card-bot"></div>
</div>