<div class="admin_category">
	<div class="admin_category-top">
		<p>CATEGORY MANAGE</p>
		<form method="POST">
			<input type="text" name="catName" placeholder="Enter new category">
			<button type="submit" name="addCat">Add</button>
		</form>
	</div>
	<div class="admin_category-mid">
		<div class="admin_category-mid-title">
			<div class="acm-col-1"><p>Number order</p></div>
			<div class="acm-col-2"><p>Category name</p></div>
			<div class="acm-col-3"><p>Delete category</p></div>
			<div class="acm-col-4"><p>Edit category</p></div>
		</div>
		<?php
			$count = 1;
			foreach($crt->catelog($conn) as $c){
			?>
			<div class="all-cat">
				<div class="acm-col-1">
					<h4><?=$count?></h4>
				</div>
				<div class="acm-col-2">
					<h3><?= $c['catName']?></h3>
				</div>
				<div class="acm-col-3">
					<form method="POST">
						<input type="hidden" name="catDel" value="<?=$c['catId']?>">
						<button type="submit" name="deleteCat">Delete</button>
					</form>
				</div>
				<div class="acm-col-4">
					<form method="POST">
						<input type="hidden" name="catEdit" value="<?=$c['catId']?>">
						<input type="text" name="newCatName" placeholder="Enter new category name">
						<button type="submit" name="editCat">Change</button>
					</form>
				</div>
			</div>
			<?php 
			$count++;
		}
		?>
	</div>
	<div class="admin_category-bot"></div>
</div>