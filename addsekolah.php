<?php
include "database.php";
ini_set('error_reporting', E_ALL & ~E_NOTICE);
	
	if(isset($_POST['nama']) && $_POST['nama']!="")
{
	
				$query = mysqli_query($conn,"INSERT INTO sekolah(nama_sekolah,tingkatan,kategori_sekolah)VALUES('".$_POST['nama']."','".$_POST['tingkatan']."','".$_POST['kategori']."')");
	
	if($query)
		{
		echo "<script>alert(\"DATA SEKOLAH SUDAH MASUK DALAM DATABASE\");</script>";	
		}
	else
		{
		echo "<script>alert(\"DATA SEKOLAH GAGAL MASUK DATABASE\");</script>";	
	}
 }
		
	
?>
<html>
<head>
<title></title>
<link rel="stylesheet" type="text/css" href="style.css">
 <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/stylee.min.css" rel="stylesheet">
   <link href="css/business-casual.css" rel="stylesheet">
 <script src="js/jquery.js"></script>
 <script src="js/bootstrap.min.js"></script>
 <script type="text/javascript" src="jquery-1.4.2.min.js"></script>
</head>
<body>
<script>
function cek()
{
if(document.addsekolah.nama.value=="")
	{
			alert("Nama  Harus Di isi!");
	}
else if	(document.addsekolah.tingkatan.value=="")
	{
			alert("Tingkatan Harus Di isi!");
	}
	else
	{
		document.addsekolah.submit();
	}
}
</script>

 <div class="container">
        <div class="row">
            <div class="box">
             <div class="col-lg-12">
                  <h2 class="intro-text text-center">
                    <strong>FORM DATA SEKOLAH</strong>
                  </h2>
                    <hr>
                    
<form action="addsekolah.php" method="post" name="addsekolah" >
<table width="781"  align="center">
<tr>
 <th width="154"  align="left">Nama Sekolah</th>
  <td width="615"><input type="text" name="nama"  size="70" onKeyUp="this.value = this.value.toUpperCase();" autocomplete="off"></td>
</tr>
<tr>
  <th height="30" align="left">Tingkatan </th>
  <td>
    <select size="0" name="tingkatan" >
      <option value="SMP">SMP</option>
      <option value="SMA">SMA</option>
      </select>
	</td>
</tr>
<tr>
  <th height="30" align="left">Kategori Sekolah </th>
  <td>
    <select size="0" name="kategori" >
      <option value="Putra">Putra</option>
      <option value="Putri">Putri</option>
      </select>
	</td>
</tr>
<tr>
  <td height="73" colspan="2" align="center">
   <input type="button" value="SIMPAN" onClick="cek()">
    <input type="reset" value="RESET">
		<input type="button" value="SHOW" onClick="window.location.href='showsekolah.php'">	</td>
</tr>
</table>
</form>
</div>
</div>
</div>
</div>
</body>
</html>
