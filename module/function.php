<?php
/**
 * 
 */
class fuc // đây là 1 class :D là 1 lớp đó :d yesas
{
	function load_app_down($conn){
		$sql="SELECT * FROM `app` ORDER BY `appDown` DESC";
		return mysqli_select($conn,$sql);
	}
	function load_app_pur($conn){
		$sql="SELECT * FROM `app` ORDER BY `appBuy` DESC";
		return mysqli_select($conn,$sql);
	}
	//
	function get_sum_app_by_cat($conn, $catId){
		$sql = "SELECT COUNT(*) as sum FROM `app` WHERE appCat = '$catId'";
		$result = mysqli_query($conn, $sql) or die ("Sorry something wrong");
		$data = $result->fetch_row();
		return $data[0];
	}
	//get sum user
	function get_sum_user($conn){
		$sql = "SELECT COUNT(*) as sum FROM `user`";
		$result = mysqli_query($conn, $sql) or die ("Sorry something wrong");
		$data = $result->fetch_row();
		return $data[0];
	}
	function get_sum_app($conn){
		$sql = "SELECT COUNT(*) as sum FROM `app`";
		$result = mysqli_query($conn, $sql) or die ("Sorry something wrong");
		$data = $result->fetch_row();
		return $data[0];
	}
	//add card
	function add_card($conn, $num, $val){
		$count = 0;
		while($count < $num){
			$seri = rand(1000000000,9999999999);
			$sql = "INSERT INTO `card` (`cardSeri`, `cardValue`, `cardStatus`) VALUES ('$seri', '$val', '0')";
			while(true){
				$sql2="SELECT cardSeri FROM `card` WHERE cardSeri = '$seri'";
				$res2 = mysqli_query($conn,$sql2);
				if(mysqli_num_rows($res2)>0)
					$seri = rand(1000000000,9999999999);
				else
					break;
			}
			$count++;
			$result = mysqli_query($conn, $sql) or die ("Create card failed");
			echo header("refresh: 0");
		}
	}
	//add category
	function add_cat($conn, $catName){
		$catId = rand(0,9999);
		while(true){
			$sql="SELECT catId FROM `category` WHERE catId = '$catId'";
			$res = mysqli_query($conn,$sql);
			if(mysqli_num_rows($res)>0)
				$catId = rand(0,9999);
			else
				break;
		}
		$sql = "INSERT INTO `category` VALUES ('$catId', '$catName')";
		$result = mysqli_query($conn, $sql) or die("Category already exists");
		echo header("refresh: 0");
	}
	//delete category
	function delete_cat($conn, $catId){
		$sql = "DELETE FROM `category` WHERE `category`.`catId` = '$catId'";
		$result = mysqli_query($conn, $sql) or die("Delete Failed!");
		echo header("refresh: 0");
	}
	//edit category
	function edit_cat($conn, $catId, $catName){
		$sql = "UPDATE `category` SET `catName` = '$catName' WHERE `category`.`catId` = '$catId'";
		$result = mysqli_query($conn, $sql) or die("Edit Failed!");
		echo header("refresh: 0");
	}
	//comment
	function add_cmt($conn, $userId, $appId, $cmt){
		$sql = "INSERT INTO `comment` (`appId`, `userId`, `cmt`) VALUES ('$appId', '$userId', '$cmt')";
		echo "Cmt";
		$result = mysqli_query($conn, $sql) or die("Comment Failed!");
		echo header("refresh: 0");
	}
	//update info
	function update_user($conn, $col, $new){
		$userId = $_SESSION['userId'];
		if($col == 'userPass'){
			$new = md5($new);
		}
		$sql = "UPDATE `user` SET `$col` = '$new' WHERE `user`.`userId` = '$userId'";
		$result = mysqli_query($conn,$sql) or die("Can not change info");
		if($col == 'fullName'){
			$_SESSION['fullName'] = $new;
		} 
		echo header("refresh: 0");
		echo "Update info success!";
	}
	function updateavt($conn, $userImg){
		$userId = $_SESSION['userId'];
		$sql = "UPDATE `user` SET `userImg` = '$userImg' WHERE `user`.`userId` = '$userId'";	
		$result = mysqli_query($conn, $sql) or die("Can not update");
		$_SESSION['userImg'] = $userImg;
		echo header("refresh: 0");
		echo "Update success";
	}
	function search_app($conn, $str){
		$sql = "SELECT * FROM `app` WHERE `appName` like '%$str%'";
		return mysqli_select($conn, $sql);
	}

	function check_login($conn,$username,$userpass){
		$sql ="SELECT * FROM `user` WHERE `userName` = '$username' AND `userPass` = '$userpass' LIMIT 1";
		//$query = "SELECT userName, userPass FROM user";
		$result = mysqli_query($conn,$sql);	
		if(mysqli_num_rows($result)>0){
			setcookie('userName', $username);
			setcookie('userPass', $userpass);
			while($row = mysqli_fetch_assoc($result)){
			$_SESSION['fullName'] = $row['fullName'];
			$_SESSION['userId'] = $row['userId'];
			$_SESSION['level'] = $row['level'];
			$_SESSION['userImg'] = $row['userImg'];
			}
			header('Location:index.php');
			return true;
		}
		else{
			echo "Login Failed";
			return false; 
		}
	}
	function register($conn,$email, $fullname, $username, $userpass){
		$random_user_id = rand(0,9999);
		while(true){
			$sql="SELECT userId FROM `user` WHERE userId = '$random_user_id'";
			$res = mysqli_query($conn,$sql);
			if(mysqli_num_rows($res)>0)
				$random_user_id = rand(0,9999);
			else
				break;
		}
		$query = "INSERT INTO user (userId, email,fullName,userName,userPass,level) VALUES ('$random_user_id','$email','$fullname','$username','$userpass','0')";
		$result = mysqli_query($conn,$query) or die("Username already exists");
			$msg = "Register Success! You will be redirected to the homepage after 5 seconds, please login again!";
			echo '<script type="text/javascript">alert("' . $msg . '")</script>';
			echo '<meta http-equiv="refresh" content="3;URL=index.php">';
		return true;
	}
	function cardlog($conn){
		return mysqli_select($conn,'SELECT * FROM `card` ORDER BY cardValue');
	}
	function catelog($conn){
		return mysqli_select($conn,'SELECT * FROM `category` ORDER BY catId');
	}
	// load app 
 	function load_app($conn,$catId){
 		$sql="SELECT * FROM `app` WHERE `appCat` = '$catId' ORDER BY `appId` DESC";
 		return mysqli_select($conn,$sql);
	}
	//show detail app
	function show_cmt($conn, $appId){
		$sql="SELECT * FROM `comment` WHERE `appId` = '$appId'";
		return mysqli_select($conn,$sql);
	}
	function show_app_cat($conn, $appId){
		$sql="SELECT `appName` FROM `app` WHERE `appCat` = (SELECT appCat FROM `app` WHERE `appId` = '$appId' LIMIT 1)";
		return mysqli_select($conn,$sql);
	}
	function get_user($conn, $userId){
		$sql="SELECT * FROM `user` WHERE `userId` = '$userId'";
		return mysqli_select_one($conn, $sql);
	}
	function get_app($conn, $appId){
		$sql="SELECT * FROM `app` WHERE `appId` = '$appId'";
		return mysqli_select_one($conn,$sql);
	}
	function get_cat($conn, $catId){
		$sql="SELECT * FROM `category` WHERE `catId` = '$catId'";
		return mysqli_select_one($conn,$sql);
	}
}	
?>