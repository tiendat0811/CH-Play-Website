<?php
$server = 'localhost';
$username = 'root';
$password = '';
$db = 'googleappstore';
$conn = mysqli_connect($server,$username,$password,$db);

// Check connection
if ($conn -> connect_errno) {
	echo "Failed to connect to MySQL: ".mysqli_connect_error();
	exit();
}

// Thực thi câu lệnh sql truy vấn một bản ghi
function mysqli_select($conn,$sql){
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_all($result, MYSQLI_ASSOC);
	mysqli_free_result($result);
	return $row;
	mysqli_close($conn);
}
// Thực thi câu lệnh sql truy vấn một giá trị
function mysqli_select_one($conn,$sql){
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($result);
	return $row;
	mysqli_close($conn);
}
// Thực hiện câu lệnh truy vấn một giá trị
function mysqli_value($conn,$sql){
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($result);
	return array_values($row)[0];
	mysqli_close($conn);
}
// Thực thi câu lệnh sql thao tác dữ liệu (INSERT, UPDATE, DELETE)\
function mysqli_exe($conn,$sql){
	$result = mysqli_query($conn,$sql);
	if (!mysqli_query($conn,$sql)) {
		echo "Lỗi : ". $sql . "<br>". mysqli_error($conn);
	}
	mysqli_close($conn);
}
?>
