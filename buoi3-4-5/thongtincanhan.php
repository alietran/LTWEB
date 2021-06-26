<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin cá nhân </title>
    <style>
         
#formthongtin{
    width: 80%;
    margin: 0 auto;
}
#thongtincanhan{
    width: 80%;
    margin: 0 auto;
}
.hinh{
    width: 40%;
}
table{
    border: 1px solid blue;
    background-color:  #aeceee ;
    width: 80%;
    margin: 0 auto;
}

.taikhoan{
    margin-right: 20px;
    line-height: 20px;
    font-size: 20px;
}
#themsp a{
    margin-top: 10px;
}
#themsp a,#danhsachsp a {
    font-size: 20px;
    text-decoration: none;
    margin-left: 180px;
    text-align: center;
    display: block;
    width: 100%;
}
#themsp a:hover,#danhsachsp a:hover{
    color: white;
}

.thongtin{
   
    text-align: center;
    font-size: 24px;
    padding-bottom: 10px;
    width: 100%;
}

#dangxuat{
    
    padding-top: 15px;
}
#dangxuat a{
    display: inline-block;
    width: 60%;
    font-weight: bold;
    margin-left: 250px;
    text-align: center;
    text-decoration: none;
    font-size: 20px;
    color: black;
    background-color: #fff;
    border: 1px solid white;
    margin-bottom: 10px;
    transition: all 0.5s;
    padding: 5px;
}

#dangxuat a:hover{
    color: white;
    background-color:  #74A8DC;
    
}


    </style>
</head>
<body>
<?php
//bắt đầu session
    session_start();
?>

<?php
    // lấy thông tin
    if(isset($_SESSION['tendangnhap'])){
        $tendn = $_SESSION['tendangnhap'];

    }
    else header("location: dangnhap.php");
    //làm việc với csdl
    //tao noi ket
    $con =  new mysqli("localhost","root","","buoi3");
    $con->set_charset("utf8");

    //viet sql
    $sql = "SELECT * FROM thanhvien WHERE(tendangnhap='".$tendn."')";
    // truy van
    $result = $con ->query($sql);


    //xu ly
    //FETCH_ASSOC: trả về dữ liệu dạng mảng với key là tên cột của bảng trong CSDL.
    if($result -> num_rows == 1 ){
        $row  = $result ->fetch_assoc();
        echo "<div id=\"thongtincanhan\">";
        echo "<div id = \"formthongtin\">";
        echo "<table>
        <tr><td colspan=\"2\" class=\"thongtin\">Thông tin cá nhân</td></tr>
        <tr>";
       
        echo "<td class=\"hinh\"> <img src=".$row['hinhanh']." width=\"250\" height=\"180\" > </td>";
        echo "<td class=\"taikhoan\"> Tên đăng nhập: ".$row['tendangnhap']."<br>
        Giới tính: ".$row['gioitinh']."<br>
        Nghề nghiệp: ".$row['nghenghiep']."<br>
        Sở thích: ".$row['sothich']."<br> </td>";
        echo "<tr><td id=\"themsp\"><a href='themsp.html'>Thêm sản phẩm</a></td></tr>";
        echo "<tr><td id=\"danhsachsp\"><a href='danhsachsp.php'>Danh sách sản phẩm</a></td></tr>";
        echo "<tr><td id=\"dangxuat\"><a href='dangxuat.php'>Đăng xuất</a></td></tr>";
        echo "</tr></table>";
        echo "</div>";
    }
  
    
    //dong ket noi
    $con->close();
    
?>
</body>
</html>

