<?php
include "database.php";
ini_set('error_reporting', E_ALL & ~E_NOTICE);
$id=$_GET['id'];	
	if(isset($_POST['nama']) && $_POST['nama']!="")
{
	
				$query = mysqli_query($conn,"UPDATE sekolah set nama_sekolah='".$_POST['nama']."',tingkatan='".$_POST['tingkatan']."' where id_sekolah='".$_POST['id_sekolah']."'");
	
	if($query)
		{
		echo "<script>alert(\"EDIT SEKOLAH SUDAH MASUK DALAM DATABASE\");</script>";	
		}
	else
		{
		echo "<script>alert(\"EDIT SEKOLAH GAGAL MASUK DATABASE\");</script>";	
	}
 }
	
	$sekolah=mysqli_query($conn,"select * from sekolah where id_sekolah='".$id."'");	
	$row=mysqli_fetch_array($sekolah)
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
if(document.editsekolah.nama.value=="")
	{
			alert("Nama  Harus Di isi!");
	}
else if	(document.editsekolah.tingkatan.value=="")
	{
			alert("Tingkatan Harus Di isi!");
	}
	else
	{
		document.editsekolah.submit();
	}
}
</script>

 <div class="container">
        <div class="row">
            <div class="box">
             <div class="col-lg-12">
                  <h2 class="intro-text text-center">
                    <strong>UPDATE DATA SEKOLAH</strong>
                  </h2>
                    <hr>
                    
<form action="editsekolah.php" method="post" name="editsekolah" >
<table width="781"  align="center">
<tr>
 <th width="154"  align="left">Nama Sekolah</th>
  <td width="615"><input type="text" name="nama" value="<?=$row[1]?>" size="70" onKeyUp="this.value = this.value.toUpperCase();" autocomplete="off"></td>
</tr>
<tr>
  <th height="30" align="left">Tingkatan </th>
  <td>
    <select size="0" name="tingkatan" >
    <option value="<?=$row[2]?>"><?=$row[2]?></option>
      <option value="SMP">SMP</option>
      <option value="SMA">SMA</option>
      </select>    </td>
</tr>
<tr>
  <td height="73" colspan="2" align="center">
  <input type="hidden" name="id_sekolah" value="<?=$row[0]?>" onClick="cek()">
   <input type="button" value="EDIT" onClick="cek()">
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
