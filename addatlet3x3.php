<?php
include "database.php";
ini_set('error_reporting', E_ALL & ~E_NOTICE);
	
	if(isset($_POST['nama']) && $_POST['nama']!="")
{
   		if (count($_POST)) {
   $img = explode('|', $_POST['img']);
 
  for ($i = 0; $i < count($img) - 1; $i++) {
       
     if (strpos($img[$i], 'data:image/jpeg;base64,') === 0) {
        $img[$i] = str_replace('data:image/jpeg;base64,', '', $img[$i]);  
        $ext = '.jpg';
     }
     if (strpos($img[$i], 'data:image/png;base64,') === 0) { 
        $img[$i] = str_replace('data:image/png;base64,', '', $img[$i]); 
        $ext = '.png';
     }
       
     $img[$i] = str_replace(' ', '+', $img[$i]);
     $data = base64_decode($img[$i]);
     $file = 'atlet/img'.date("YmdHis").'_'.$i.$ext;
     if (file_put_contents($file, $data)) 
			 {
  				}
	 else {
        echo '<p>Image $i could not be saved. </p>';
     		}  
    	}
		}
		if(isset($_POST['simpan']))
		{
			$query = mysqli_query($conn,"INSERT INTO atlet(id_atlet,nama,nama_team,foto)VALUES('','".$_POST['nama']."','".$_POST['nama_team']."','".$file."')");
	
	if($query)
		{
		echo "<script>alert(\"DATA ATLET SUDAH MASUK DALAM DATABASE\");</script>";	
		}
	else
		{
		echo "<script>alert(\"DATA ALTEL GAGAL MASUK DATABASE\");</script>";	
	}
		}
		
	}
?>
<!DOCTYPE html>
<style>
    .dropdown {
    position: relative;
    display: inline-block;
  }
  
  .dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    padding: 12px 16px;
    z-index: 1;
  }
  
  .dropdown:hover .dropdown-content {
    display: block;
  }
</style>
<script>
function cek()
{
if(document.addatlet.nama.value=="")
	{
			alert("Nama Harus Di isi!");
	}
	else
	{
		document.addatlet.submit();
	}
}
</script>
<script type="text/javascript">

    function PreviewImage() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("inp_files").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("uploadPreview").src = oFREvent.target.result;
        };
    };
</script>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie-edge">
        <link rel="stylesheet" href="style_home.css">
        <title>3x3 PIALA KEMERDEKAAN RI KE-79 KUDUS</title>
    </head>
    <body>
        <div class="backgroundALL"></div>
        <div id="sidebar">
            <div class="sideheader">
                <div class="name">
                    <h1>
                         
                    </h1>
                </div>
                <div class="hamburgerbar">
                    <a href="#" onclick="hamburgerFunc()">
                        <div>
                            <div class="bar topbar"></div>
                            <div class="bar middlebar"></div>
                            <div class="bar bottombar"></div>
                        </div>
                    </a>    
                </div>
            </div>
            <div class="sidebody">
                <div class="sidebodypart">
                    <ul>
                        <li><a href="Home.php"><p>Home</p></a></li>
                        <li><a href="showatletsmpputra.php"><p>SMP Putra</p></a></li>
                        <li><a href="showatletsmpputri.php"><p>SMP Putri</p></a></li>
                        <li><a href="showatletsmaputra.php"><p>SMA Putra</p></a></li>
                        <li><a href="showatletsmaputri.php"><p>SMA Putri</p></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="navbar">
            <div class="barinfo">
                <div class="dropdown">
                   <span>Logout</span>
                    <div class="dropdown-content">
                        <a href="prosesLogout.php">Logout</a>
                    </div>
                </div>
            </div>
        </div>
        <div id="dashboardData">
                  <h2 style="text-align:center;">
                    FORM DATA ATLET
                  </h2>
                    <hr>
                    
<form action="addatlet3x3.php" method="post" name="addatlet" enctype="multipart/form-data" >
<table width="789"  align="center">
<tr>
 <th width="111"  align="left">Nama</th>
  <td width="443"><input type="text" name="nama"  size="70" onKeyUp="this.value = this.value.toUpperCase();" autocomplete="off"></td>
</tr>
<tr>
 <th width="111"  align="left">Nama Team</th>
  <td width="443"><input type="text" name="nama_team"  size="70" onKeyUp="this.value = this.value.toUpperCase();" autocomplete="off"></td>
</tr>
<tr>
 <th height="30" width="111" align="left">
    Foto </th>
  <td> <img id="uploadPreview" style="width: 80px; height: 80px;" /><br /> 
   <input id="inp_files" type="file" multiple="multiple"  onchange="PreviewImage();">
    </td>
</tr>
<tr>
	<td height="73" colspan="2" align="center">
    <input id="inp_img" name="img" type="hidden" value=""> 
     <input name="simpan" type="hidden" value="1"> 
		<input type="button" id="click" value="SIMPAN" onClick="cek()">
		<input type="reset" value="RESET">
    <input type="button" value="SHOW" onClick="window.location.href='home.php'">	</td>
</tr>
</table>
</form>
</div>
</div>
</div>
</div>
<script>
 
  function fileChange(e) { 
     document.getElementById('inp_img').value = '';
 
     for (var i = 0; i < e.target.files.length; i++) { 
     
        var file = e.target.files[i];
 
        if (file.type == "image/jpeg" || file.type == "image/png") {
 
           var reader = new FileReader();  
           reader.onload = function(readerEvent) {
 
              var image = new Image();
              image.onload = function(imageEvent) { 
 
                 var max_size = 650;
                 var w = image.width;
                 var h = image.height;
                   
                 if (w > h) {  if (w > max_size) { h*=max_size/w; w=max_size; }
                 } else     {  if (h > max_size) { w*=max_size/h; h=max_size; } }
               
                 var canvas = document.createElement('canvas');
                 canvas.width = w;
                 canvas.height = h;
                 canvas.getContext('2d').drawImage(image, 0, 0, w, h);
                 if (file.type == "image/jpeg") {
                    var dataURL = canvas.toDataURL("image/jpeg", 1.0);
                 } else {
                    var dataURL = canvas.toDataURL("image/png");    
                 }
                 document.getElementById('inp_img').value += dataURL + '|';
              }
              image.src = readerEvent.target.result;
           }
           reader.readAsDataURL(file);
        }
		 else {
           document.getElementById('inp_files').value = ''; 
           alert('Please only select images in JPG- or PNG-format.');   
           return false;
        }
     }
 
  }
 
  document.getElementById('inp_files').addEventListener('change', fileChange, false);   
         
</script>
    </body>
    <script src="script_home.js"></script>
</html>