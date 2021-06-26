<?php
	//tao ket noi
	$con= new mysqli("localhost", "root", "", "buoi3");
	$con->set_charset("utf8");
	//lay du lieu
	$tendangnhap= $_GET['tdn'];
    // echo $tendangnhap;
	// sql
	$sql= "SELECT * FROM thanhvien WHERE (tendangnhap='".$tendangnhap."')";
	$result= $con-> query($sql);
    //echo $result;
	if( $result->num_rows> 0){
    echo "Tên đăng nhập đã tồn tại";
    }
	//buoc cuoi
	$con->close();
	
?>