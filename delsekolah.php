<?php
include "database.php";
ini_set('error_reporting', E_ALL & ~E_NOTICE);
$id=$_GET['id'];	
				$query = mysqli_query($conn,"DELETE from sekolah where id_sekolah=$id");
	
	if($query)
		{
		echo "<script>alert(\"DELETE SEKOLAH SUKSES\");</script>";	
		}
	else
		{
		echo "<script>alert(\"DELETE SEKOLAH  GAGAL\");</script>";	
	}

?>