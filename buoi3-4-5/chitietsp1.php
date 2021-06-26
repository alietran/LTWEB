<!DOCTYPE html>
<html>
<body>
	
	<?php
	session_start();
	//tao ket noi
		$con = new mysqli ("localhost","root","","buoi3");
		// $con= new mysqli("localhost", "id15041673_tanthanh", "Thanhhhh365!", "id15041673_buoi3");
		$con-> set_charset("utf8");
	//lay du lieu
		$tendangnhap=$_POST['tendangnhap'];
		$matkhau= md5($_POST['matkhau']);
	//lay hinh dai dien
		$hinh="./img/" . $_FILES['hinhdaidien']['name'];
		$content = $_FILES['hinhdaidien']['tmp_name'];
		move_uploaded_file($_FILES['hinhdaidien']['tmp_name'],$hinh);
		echo $hinh;
	//Lay du lieu gioi tinh
		$gioitinh=$_POST['gioitinh'];
		echo $gioitinh;
	//Lay du lieu nghe nghiep
		$nghenghiep= $_POST['nghenghiep'];
		echo $nghenghiep;
	//lay du lieu so thich
		$st="";
		$sothich = $_POST['sothich'];
		foreach ($sothich as $value){
			$st = $st . " " . $value;
		} 
		echo $st;
	//cau lenh sql
		$result=$con->query( "INSERT INTO thanhvien (tendangnhap, matkhau, hinhanh, gioitinh, nghenghiep, sothich)
					VALUES ('$tendangnhap','$matkhau','$hinh','$gioitinh', '$nghenghiep', '$st')");
		if($result==true){
			$_SESSION['tendangnhap']=$tendangnhap;
			header('location: thongtincanhan.php');
		}else{
			echo "Dang ky khong thanh cong!!!";
		}
	//Buoc cuoi
		$con->close();
	//thông báo
	
		echo "Bạn đã đăng kí tài khoản thành công!";

 //test
	?>
</body>
</html>