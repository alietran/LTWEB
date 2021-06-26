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

            $con = new mysqli("localhost","root","","buoi3");
            $con->set_charset('utf8');

            $id = "select * from  thanhvien where tendangnhap = '$ten'";
            $result = $con ->query($id);
            if($result -> num_rows ==1 ){
                $row = $result ->fetch_assoc();
                $idtv = $row['id'];
            }

            echo $ten;
            echo $idtv;
            $idsp = $_GET['idsp'];
            echo $idsp;
            

            $sql = "select * from  thanhvien where tendangnhap = '$ten'";

            $result1 = $con -> query($sql);
            if( $result1->num_rows == 1){
                $row = $result1->fetch_assoc();
                $idtv = $row['id'];
            }
            
            echo $idtv;
            $sql1 = "delete from sanpham where (idtv=$idtv) and (idsp = $idsp)";
            $result2 = $con->query($sql1);
            echo $sql1;
            header('location: danhsachsp.php');
            $con->close();
        }else header('location: dangnhap.html');



    ?>
</body>
</html>