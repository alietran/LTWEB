<?php
    // bắt đầu session
        session_start();
    ?>
<?php
    //tao noi ket
        $con = new mysqli("localhost","root","","buoi3");   
        $con-> set_charset("utf8");
    //lay du lieu
        $tendn = $_POST['tendangnhap'];
        $mk = md5($_POST['matkhau']);
    //lay hinh dai dien
    $hinh="../img/" . $_FILES['hinhdaidien']['name'];
    // $content = $_FILES['hinhdaidien']['tmp_name'];
    move_uploaded_file($_FILES['hinhdaidien']['tmp_name'],$hinh);
    // echo $hinh."<br>";
    //lay du lieu gioi tinh
        $gioitinh = $_POST['gioitinh'];
        // echo $gioitinh ."<br>";
    //lay du lieu nghe nghiep
    $nghenghiep = $_POST['nghenghiep'];
    // echo $nghenghiep  ."<br>";
    //lay du lieu so thich
    $st=""; 
    $sothich = $_POST['sothich'];
    foreach ($sothich as $value) {
        $st = $st . "" . $value .", ";

    }
    // echo $st."<br>";
     // cau lenh sql   
        $sql="INSERT INTO thanhvien( tendangnhap, matkhau, hinhanh, gioitinh, nghenghiep, sothich)
        VALUES ('$tendn','$mk','$hinh',' $gioitinh','$nghenghiep','$st')";
        $result = $con->query($sql);
   
    // echo $sql;
    //thong bao
    if($result == true){
        $_SESSION['tendangnhap'] = $tendn;
        header('location: dangnhap.html');
        
    }
    else echo "Đăng ký không thành công!";
    // buoc cuoi
    $con->close();
?>