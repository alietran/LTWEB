<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa</title>
</head>
<body>
    <?php
        session_start();
        $con = new mysqli("localhost","root","","buoi3");
        $con ->set_charset('utf8');
        if(isset($_SESSION['tendangnhap'])){
            $ten = $_SESSION['tendangnhap'];
        }
        $sql = "select id from thanhvien where (tendangnhap = '".$ten."')"; //$ten và '".$ten."'
        $result = $con -> query($sql);

        if($result->num_rows==1){
            $row=$result->fetch_assoc();
            $idtv=$row['id'];
        }
        
        //lấy id sp
        $idsp = $_GET['idsp'];
        $sql1 = "select * from sanpham where (idsp = '".$idsp."') and (idtv='".$idtv."')";
        $result1 = $con->query($sql1);
        if($result1->num_rows != 0){
            $row = $result1->fetch_assoc();

        }

        echo "<div class=\"form\">";
        echo "<form action=\"xuly_sua.php?idsp=".$idsp."\" method=\"POST\" enctype=\"multipart/form-data\">";?>
            <h1>Sửa thông tin sản phẩm</h1>
            <hr>
            <table>
                <tr>
                    <td>Tên sản phẩm</td>
                    <td><input type="text" name="tensp" value="<?php echo $row['tensp']?>"></td>
                </tr>
                <tr>
                    <td>Chi tiết sản phẩm</td>
                    <td><input type="text" name="chitietsp" style="height: 100px; width: 250px;" value="<?php echo $row['chitietsp']?>"></td>
                </tr>
                <tr>
                    <td>Giá sản phẩm</td>
                    <td><input type="text" name="giasp" value="<?php echo $row['giasp']?>">(VND)</td>
                </tr>
                <tr>
                    <td>Hình sản phẩm</td>
                    <td><input type="file" name="hinhanhsp"></td>
                </tr>
                <tr>
    
                    <td colspan="2" style="text-align:center;">
                        <input type="submit" value="Lưu lại sản phẩm">
                        <input type="reset" value="Làm lại">
                    </td>
                </tr>
            </table>
        
        </form>
    </div>
    <?php
    $con->close();

    ?>
</body>
</html>