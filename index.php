<?php
// ở đây mình sẽ tạo ra 1 cái module để connect tới server trước :D 
// nhưng sẽ có 1 số bất cập khi mình chuyển hướng với php 
// không cần dài dòng -> cách fix: ob_start(); :v 
ob_start();
// thế là đã fix xong ::V
// tiếp theo là luôn luôn phải có session đúng hơm sesion + cokie ok sài cookie đi khỏi dùng session nếuu vậy khỏi cần làm gì :v 
// insert file connect tới server
require 'module/connected.php';
// đã insert xong :D ra test xem coi có gì không 
// ok sau khi đã connected xong thì chèn cái file viết function cho nó :D 
require 'module/function.php';
// để cùng bậc với thằng connectedo klil oki anh :v
// ok tiếp theo mình sẽ cần có những biến cố định như kiểu để phân trang hay gì đó đi đâu cũng sài thì mình tạo 1 file public để gán biến toàn cầu cho nó :D 
// nếu sau này mà để cái biến đó ở pub thì ở index này em phải req cái function trước nó nha à, 
require 'module/public.php';
// ok chèn xong hết phần cần chèn rồi :D giờ mình sẽ xử lý giao diện
// phần này mình sẽ chèn cái đầu trang vô  dùng include_one vì nó chỉ chèn duy nhất :v
include_once 'views/header.php';
// kết thúc chèn đầu trang
// xử lý in the area :v sao mấy cái trên anh ko xài include :v required nó ko cho chạy :v chắc không :v ? req với incl giống nhau thôi :d em xài required nó lỗi là ko chạy code ở dưới :v đúng rồi em biết tại sao không ? tại nó khác included :v cùng là gọi thư viện dzo
// nhưng mà req cái file connected mà không dùng incl thì kiểu -> em không connected được  server thì không chạy mấy thằng dưới nữa :v oki anh :v vì thế anh mới sài chứ không phải là thích là sài đâu :V oke tiếp :v 
// bắt đầu ta sẽ cho 1 biến get :D 
// tại sao lại dùng get ? Vì khi người dùng họ yêu cầu 1 trang nào đó chúng ta sẽ lấy trực tiếp từ link về luôn chứ không post biết gì hết :v anh sẽ ví dụ :D 
 
// không có gì ? thì đúng là méo có gì :D vì mình chưa truyền get cho nó sao nó có gì :v em bit rui <3 
// oke :v vậy để xem cái get có chạy không . quen cái thói không ấn save -.- mốt auto save lỗi cái bay luôn project :v không đâu :v haha thôi tiếp tụt
// giờ ta sẽ xử lý controller khi người dùng truy cập theo kiểu biến đó nhé :D . vi diệu nhỉ :v nhưng khi anh truyền biến act == rỗng tại sao nó lại không về trang chủ ?  chuẩn :v ok vậy được rồi :v 
if(isset($_GET['act']) && $_GET['act']!="") // ở đây anh sẽ kiểm tra xem có biến act không
{
	// ok ghi mà ta đã tìm thấy được biến get thì gán vào 1 biến khác cho dễ nhớ 
	$act = $_GET['act'];
	// ở đây anh gán $act mình sẽ làm lách luật xíu nhé
	// anh sẽ truyền vào biến act là 1 cái tên của 1 cái file được đặt ở trong controller :D 
	// ví dụ : $act = showdanhsach thì sẽ tự động include file : controller/showdanhsach.php 
	// hiểu hông :v hiểu rui ok 
	// vì sao anh điền link bậy mà vẫn ở trang chủ :v ? vì nó không tìm thấy cái file đó trong thư mục controller không hẳn vì nó kiểm tra cái dir . cái dir nó không tồn tại ở thư mục đó nên nó không chạy :v :V e, biet rui, may cai căn bản :v vậy được :V
	// và thế thôi :v giờ chỉ cần tạo controller rồi include view vào sài :D  đã hiểu chưa :v rui :v vậy cái control chỉ để move sang view thu ìa anh :v đúng rồi với lại nó để gọi biến hoặc function lên sài :D oki cần giúp gì nữa hong :v chỉ cái vụ div đi anh :v nó lạ vl
	// div nó là 1 khối :v kiểu nó như là 1 secsion kiểu em làm thanh header, nó cứ xuống dòng :v xài float nó ko định dạnng được flaot của khối nào à oke :v đây
	$dir = 'controller/'.$act.'.php';
	if(file_exists($dir)){
	include_once $dir;
	}else{
		include_once 'views/home.php';
	}
// kiểm tra nào D: 
}else // nếu không có thì sẽ tự nhảy về trang chủ :D cùng nhau xem điều kì diệu nhé :v
{
	include_once 'views/home.php';
}

// tiện tay chèn luôn chân trang rồi hẳn làm phần thân :v 
include_once 'views/footer.php';
?>
