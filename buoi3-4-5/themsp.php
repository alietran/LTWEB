<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm</title>
    <style>
        #dangnhap{
			margin-top: 50px;
			text-align: center;
            font-size: 20px;
		}
		button{
			font-size: 17px;
		}

    </style>
</head>
<body>
<?php
    session_start();

?>
<?php

    if(isset($_SESSION['tendangnhap'])){
        $con = new mysqli("localhost","root","","buoi3");
        $con->set_charset("utf8");

        $tensp = $_POST['tensp'];
        $ct =  $_POST['chitietsp'];
        $gia = $_POST['giasp'];
        $duongdan = "../img/".$_FILES['hinhanhsp']['name'];
        move_uploaded_file($_FILES['hinhanhsp']['tmp_name'],$duongdan);
        //lenh sql
        $tendn = $_SESSION['tendangnhap'];
        $sql1 = "SELECT id FROM thanhvien where (tendangnhap = '$tendn')";
        //xu ly
        $result1 = $con->query($sql1);
        //echo $sql1;
        if($result1->num_rows == 1 ){
            $row  = $result1->fetch_assoc();
            $idtv = $row ['id']; //gtri vừa lấy vào id thành viên

        }

        $sql = "Insert into sanpham (tensp, chitietsp,giasp,hinhanhsp,idtv)
        values ('$tensp','$ct','$gia','$duongdan','$idtv')";

        //truy vấn
        echo $sql;
        $result = $con->query($sql);
        if($result==true){
            header('location: danhsachsp.php');
            
        }
        else{
            header('location: themsp.php');
        }
        $con->close();


    }else {
        echo "<div id=\"dangnhap\">" ;
        echo "<p>Vui lòng đăng nhập! <br>Bấm vào đây để Đăng nhập</p>";
        echo "<a href=\"dangnhap.html\"><button>Đăng nhập</button></a>
    </div>";
    }
    

?>
 
</body>
</html>
