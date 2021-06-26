<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sản phẩm</title>
    <style>
        table{
            margin: 0 auto;
			background-color: #DDDDDD;
			width: 500px;
			border-collapse: collapse;
            text-align: center;
        }
        .chitiet:hover,.xoa:hover,.sua:hover{
            color:red;
        }

        #page{
			margin: 50px auto;
			width: 600px;
			background-color: #eee;
			padding-bottom: 20px;
			text-align: left;
			border: solid #74A8DC;
		}
		#page p{
			margin-left: 50px;
			font-size: 20px;
		}

		h2{
			margin: 0 0;
			text-align: center;
			color: #74A8DC;
		}

		hr{
			border: 1px dotted #74A8DC;
		}

		a{
			text-decoration: none;
			color: black;
			display: block;
            font-size: 16px;
        }
		a:hover{
            color: red;
            
            font-size: 16px;
        }

		#livesearch, input, form{
			margin:0 auto;
            width: 300px;
        }
        #dangnhap {
			margin-top: 50px;
			text-align: center;
            font-size: 20px;
		}
		.dangxuat{
            font-size: 17px;
            padding: 10px;
            

        }
    </style>
</head>
<body>
        Tìm kiếm
        <input type="text" onkeyup="search(this.value)">
        <p id="livesearch"></p>
    <?php
    //echo "<p onkeyup=\"search(this.value)\">Tìm kiếm:  <input type=\"text\"></p>";
    //echo "<p id=\"livesearch\"> </p>";
   session_start();
        if(isset($_SESSION['tendangnhap'])) {
            $ten=$_SESSION['tendangnhap'];
        
        //tao ket noi
        $con= new mysqli("localhost","root","","buoi3");
        $con -> set_charset("utf8");
        //Lay id
        $id="SELECT * FROM thanhvien WHERE (tendangnhap='".$ten."')";
        $result = $con -> query($id);
        if($result -> num_rows==1){
            $row = $result -> fetch_assoc();
            $id= $row['id'];
        }
        $sql = "SELECT * from sanpham where (idtv = '".$id."')";
        $result1 = $con->query($sql);

        echo "<div id=\"page\">";
        echo "<h2> Xin chào ".$ten."!</h2>";
        echo "<hr>";
        echo "<div style=\"z-index:1\" id=\"livesearch\"> 
                
        </div>";
        if( $result1->num_rows!=0){
        echo "<p>Danh sách sản phẩm của bạn là:</p>";
            
            echo "<table border=1 > 
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Giá </th>
                                        <th colspan=3>Lựa chọn</th>
                                    </tr>";
            $i= 1; 
            //tao mang luu idsp
            
        while($row= $result1->fetch_assoc()){
            echo "					<tr>
                                        <td>".$i."</td>";
            echo "						<td onmouseover=\"popupImage(".$row['idsp'].")\" onmouseout=\"offpopup(".$row['idsp'].")\">".$row['tensp']."<div style=\"position: absolute;display:none;z-index:1;margin:-23px 0px 0px 130px;\" id=\"popup".$row['idsp']."\"><img src=".$row['hinhanhsp']." width=\"300\" ></div></td>";                                        
            echo "						<td>".$row['giasp']." (VND)</td>";
            echo "						<td class=\"chitiet\" onclick=\"chitiet(".$row['idsp'].")\">Chi tiết</td>";
            echo "						<td ><a href=\"sua.php?idsp=".$row['idsp']."\" style=\"text-decoration: none;\"><img src=\"../img/edit.png\" alt=\"Sửa\" width=\"20px\">Sửa</a></td>";
            echo "						<td ><a href=\"xoa.php?idsp=".$row['idsp']."\" style=\"text-decoration: none;\"><img src=\"../img/delete.png\" alt=\"Xóa\" width=\"20px\">Xóa</a></td>";
            echo "					</tr>";
            $i=$i+1;
        }
        
            echo "					<tr>
                                        <td class=\"dangxuat\" colspan=\"6\"><a href=\"dangxuat.php\" style=\"text-decoration: none;\">Đăng xuất</a></td>";
            echo"					</tr>";
            echo "</table>";
     }
        else {echo "Bạn không có sản phẩm nào!";
            echo "<br>Thêm sản phẩm <a href=\"themsp.html\">Tại đây</a>";}
        // buoc cuoi
        echo "</div>";
        echo "<p id=\"chitiet\"></p>";
        $con->close();
     }else
     {
        echo "<div id=\"dangnhap\">
		<p> Vui lòng đăng nhập!<br></p>
		<a href=\"dangnhap.html\"> <button> Đăng nhập</button> </a>
	    </div>";
     }
?>
 <script>
    function chitiet(str) {
        var xmlhttp;
        xmlhttp=new XMLHttpRequest(); 
        xmlhttp.onreadystatechange=function() {
            if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            document.getElementById("chitiet").innerHTML=this.responseText;
            }
        }
        xmlhttp.open("GET","chitietsp.php?idsp="+str,true);
        xmlhttp.send();
    }


    function popupImage(id){       
        document.getElementById("popup"+id).style.display = "block";
    
    }
    function offpopup(id){
        document.getElementById("popup"+id).style.display = "none";
        
    }


    function search(str){
        if(str.length==0){
            document.getElementById("livesearch").innerHTML = "";
            document.getElementById("livesearch").style.border = "0px";
            return;
        }
        var xmlhttp;
        xmlhttp= new XMLHttpRequest();
        xmlhttp.onreadystatechange=function(){
            if(xmlhttp.readyState=4 && xmlhttp.status==200){
                document.getElementById("livesearch").innerHTML=this.responseText;
            }
        }
        xmlhttp.open("GET","search.php?str="+str,true);
        xmlhttp.send();
    }


</script>
</body>
</html>