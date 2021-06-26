<?php
    session_start();
    if(isset($_SESSION['tendangnhap'])) {
        $ten=$_SESSION['tendangnhap'];
    }
    $str = $_GET['str'];
    $con = new mysqli("localhost","root","","buoi3");
    $con -> set_charset("utf8");

    $sql = "SELECT * FROM thanhvien where (tendangnhap = '".$ten."')";
    $result = $con -> query($sql);

    if($result -> num_rows != 0){
        $row = $result->fetch_assoc();
        $id = $row['id'];
    }
    $sql1 = "SELECT * FROM sanpham where (idtv= '".$id."')
     and (tensp LIKE '%".$str."%')";
    $result1 = $con -> query($sql1);

    if($result1 -> num_rows !=0){
        while($row1 = $result1->fetch_assoc()){
            echo $row1['tensp'];
            echo "<br>";
        }
    }

    $con->close();



?>