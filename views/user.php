	
<div class="user">
	<div class="user-top">
		<p>User information page</p>
	</div>

	<div class="user-mid">
		<div class="user-mid-left">
		<?php
			$get_user = $crt->get_user($conn,$_SESSION['userId']);
			echo "<img src='./avatar/".$get_user['userImg']."'>"
		?>	
		<form action="" method="post" enctype="multipart/form-data">
	    	<h4>Choose files to upload:</h4>
	    	<input type="file" name="avt" id="avt"><br>
	   		<button type="submit" name="updateavt"><p>Change avatar</p></button>
		</form>
		</div>
		<div class="user-mid-right">
				<div class="utr-edit">			
					<h3>Money: 	<?= $get_user['userMoney']?> VND</h3>
				</div>
				<div class="utr-edit">			
					<h3>Email: 	<?= $get_user['email']?></h3>
					<button><a href="?update=email">Edit</a></button>
				</div>
				<div class="utr-edit">	
					<h3>Fullname: 	<?= $get_user['fullName']?></h3>
					<button><a href="?update=fullName">Edit</a></button>
				</div>
				<div class="utr-edit">	
					<h3>Username: 	<?= $get_user['userName']?></h3>
					<button><a href="?update=userName">Edit</a></button>
				</div>
				<div class="utr-edit">
					<button id="utr-edit-b"><a href="?update=userPass">Change password</a></button>
				</div>
		</div>
	</div>
	<div class="user-bot"></div>
</div>