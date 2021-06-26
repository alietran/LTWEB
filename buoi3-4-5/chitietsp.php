<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết sản phẩm</title>
</head>
<body>
    <?php 
    session_start();
    if(isset($_SESSION['tendangnhap'])) {
        $ten=$_SESSION['tendangnhap'];
    }  
    
    $idsp=$_GET['idsp'];

    $con = new mysqli("localhost","root","","buoi3");
    $con -> set_charset('utf8');
    //lấy id
    $sql = "select * from thanhvien where (tendangnhap = '".$ten."') ";
    $result = $con->query($sql);
    if($result->num_rows == 1){
        $row = $result->fetch_assoc();
        $idtv = $row['id'];
    }
   //hiển thị thông tin sản phẩm
    $sql1 = "select * from sanpham where (idsp = '$idsp') and (idtv= '$idtv')";
    $result1 = $con->query($sql1);
    if($result1->num_rows!=0){
        $row=$result1->fetch_assoc();
        echo "<div id=\"chitiet\">";
        echo "<table>
            <tr>
                <td><img src=".$row['hinhanhsp']." width=\"250\"></td>
                <td>Tên sản phẩm: ".$row['tensp']."<br>Chi tiết: ".$row['chitietsp']."<br>Giá tiền: ".$row['giasp']."
                </td>";
   
                
        echo "</tr>
        </table>"; 
    echo "</div>";
    }
    ?>
</body>
</html>