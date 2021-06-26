<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
         session_start();
        if(isset($_SESSION['tendangnhap'])){
            $ten = $_SESSION['tendangnhap'];
        }

        $con = new mysqli("localhost","root","","buoi3");
        $con->set_charset('utf8');

        $tensp = $_POST['tensp'];
        $ct =  $_POST['chitietsp'];
        $gia = $_POST['giasp'];
        $duongdan = "../img/".$_FILES['hinhanhsp']['name'];
        move_uploaded_file($_FILES['hinhanhsp']['tmp_name'],$duongdan);
        
        //lenh sql
        $idtv="SELECT id FROM thanhvien where (tendangnhap = '$ten')";
        $result = $con->query($idtv);
        if($result->num_rows==1){
            $row = $result->fetch_assoc();
            $idtv = $row['id'];

        }
        $idsp = $_GET['idsp'];
        $sql1 = "UPDATE sanpham set tensp='$tensp',chitietsp='$ct',giasp='$gia',hinhanhsp='$duongdan' 
        where (idtv = '$idtv') and (idsp = '$idsp')";
        echo $sql;
        $result = $con->query($sql1);
        header('location: danhsachsp.php');
        $con->close();


    ?>
    

</body>
</html>