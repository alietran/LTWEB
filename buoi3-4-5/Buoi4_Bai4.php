<?php
    session_start();
    if(isset($_SESSION['tendangnhap'])){
        $ten=$_SESSION['tendangnhap'];
    }
    $con= new mysqli("localhost","root","","buoi3");
    $con -> set_charset("utf8");
    //Lay id
    $id="SELECT * FROM thanhvien WHERE (tendangnhap='".$ten."')";
    $result = $con -> query($id);
    if($result -> num_rows==1){
        $row = $result -> fetch_assoc();
        $id= $row['id'];
    }
    
    $sql="SELECT *FROM sanpham WHERE idtv='$id'";
    
    $result1=$con->query($sql);
    if($result1 -> num_rows >0){
        $i=0; 
        $IMAGE_PATHS = [];
        $IMAGE_NAMES = [];
        while ($row1= $result1-> fetch_assoc()) {   
            $IMAGE_PATHS[$i]=  $row1['hinhanhsp'];
            $IMAGE_NAMES[$i]=  $row1['tensp'];
            $i++;
       }
    }
    $con -> close();
?>
<html>
<head> 
	<title> Lập trình web (CT428) </title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" type="text/css" href="styleB4.css" media="screen" />
</head>
<body>
<div id="wrap">
	<div id="title">
		<h1>Bài 4 - Buổi 4</h1>
	</div> <!--end div title-->
	<div id="menu">
		<!-- chèn menu của sinh viên vào-->
	</div> <!--end div menu-->
	<div id="content">
		<!--Nội dung trang web-->
		<h1>Slide show</h1>
    <p><a href="danhsachsp.php">Danh sách sản phẩm</a></p>
<form>
	<img id="laptopImg" src="<?php echo $IMAGE_PATHS[0]?>" height="300" width="300" />
	<br/>
	<input type="button" name="previous" value="Previous" onclick="changeSlide(-1)" >
	<input type="button" name="next" value="Next" onclick="changeSlide(1)">
	<br/>
	<select name="laptopSel" id="option" onchange="chooseSlide(value)">
        <?php
            $i=0;
            foreach($IMAGE_PATHS as $pic) {   
                echo "<option value= \"".$i."\">$IMAGE_NAMES[$i]</option>";
                $i++;
           }
        ?>
    </select> 
    <script>
        var index=0;
        var i=<?php echo $i;?>;
        var IMAGE_PATHS=[];
        <?php
            $i=0;
            foreach($IMAGE_PATHS as $pic) { 
                echo "IMAGE_PATHS[$i] =  \"".$pic."\";";
                $i++;
           }
        ?>
    function changeSlide(pos) {
        // sinh vien tu viet code cho changeSlide:
        // pos = 1: hien thi file anh tiep theo 
        // pos = -1: hien thi file anh truoc do
	    index=index+pos;
	    if(index<0) index=(i-1);
	    if(index>(i-1)) index=0;
	    document.getElementById("laptopImg").setAttribute("src",IMAGE_PATHS[index]);
	    document.getElementById("option").selectedIndex=index;
    }

    function chooseSlide(pos) {
        // sinh vien tu viet code cho chooseSlide:
        // pos = x: hien thi file anh x
	    document.getElementById("laptopImg").setAttribute("src",IMAGE_PATHS[pos]);
    }
</script>
</body>
</html>