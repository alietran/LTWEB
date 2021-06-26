<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
</head>
<body>
<?php
    session_start();
?>
<?php

//tạo kết nối
    $con = new mysqli("localhost","root","","buoi3");
    $con -> set_charset("utf8");
//lấy dữ liệu
    $tendn = $_POST['tendangnhap'];
    $mk = md5($_POST['matkhau']);

//cau lenh sql
    $sql = "SELECT * FROM thanhvien 
    WHERE tendangnhap = '".$tendn."' AND matkhau = '".$mk."'";
    $result = $con->query($sql);
    // echo $result->num_rows;
    // echo $sql;
    
    
//xử lý
if($result->num_rows > 0){
    $_SESSION['tendangnhap' ] = $_POST['tendangnhap'];
    // header('location: thongtincanhan.php');
    header('location: Buoi4_Bai4.php');
}
else {
    header('location: Buoi4_dangnhap.html');
}
// đóng kết nối
    $con->close();

?>
</body>
</html>
