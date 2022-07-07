
<div class="admin">
	<div class="admin-top">
		<p>Administrator's management page</p>
		<div class="admin-top-menu">
			<div class="admin-do">
				<a href="?act=admin_category"><button>Category Manage</button></a>
			</div>
			<div class="admin-do">
				<a href="?act=admin_card"><button>Card Manage</button></a>
			</div>
			<div class="admin-do">
				<a href="?act=admin_overall"><button>Overall</button></a>
			</div>
		</div>
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
	<div class="admin-bot">
		
	</div>
</div>
<?php 
	if(isset($_POST['updateavt'])){
		if($_FILES['avt']['error'] > 0){
			echo "Upload failed!";
		}
		else{
			$file_part = explode('.',$_FILES['avt']['name']);
			$file_ext = strtolower(end($file_part));
			$expensions	= array("jpeg","jpg","png",'gif');
			if(in_array($file_ext,$expensions)=== false){
				echo "Only JPG, JPEG or PNG files are supported.";
			}else{
				move_uploaded_file($_FILES['avt']['tmp_name'], 'avatar/'.$_FILES['avt']['name']);
				$updateavt = $crt->updateavt($conn, $_FILES['avt']['name']);		 
			}
		}
	}
?>
