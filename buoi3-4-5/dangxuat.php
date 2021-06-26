
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng xuât</title>
</head>
<body>
<?php
    session_start();
    unset($_SESSION['tendangnhap']);
    if(isset($_SESSION['tendangnhap'])==false){
        header("location: Buoi4_dangnhap.html");
    }
?>
<div id="dangnhap">
		<p> Bạn đã đăng xuất!<br> Bấm vào đây để Đăng nhập</p>
		<a href="dangnhap.html"> <button> Đăng nhập</button> </a>
	</div>
</body>
</html>