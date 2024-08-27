<?php
include "database.php";
ini_set('error_reporting', E_ALL & ~E_NOTICE);
if(isset($_POST['nama']))
{
	if($_POST['nama']!="")
	{
	$query = mysqli_query($conn,"SELECT * FROM sekolah where nama_sekolah like '%".$_POST['nama']."%' order by nama_sekolah asc limit 10"); 
		$jml = mysqli_num_rows($query);
	}
	else
	{
		$query = mysqli_query($conn,"SELECT * FROM sekolah order by nama_sekolah ASC");
		$jml = mysqli_num_rows($query);
	}
}
?>
<html>
<head>
<title>DANDIM CUP 2019</title>
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" media="all" href="calendar-win2k-cold-1.css"/>
<script type="text/javascript" src="js/calendar.js"></script>
<script type="text/javascript" src="js/lang/calendar-en.js"></script>
<script type="text/javascript" src="js/calendar-setup.js"></script>
<style type="text/css">
<!--
.style1 {color: #0000FF}
.style2 {color: #FF0000}
-->
#oval {
	width: 600px;
	height: 130px;
	background: #00FFFF;
	-moz-border-radius: 100px ;
	-webkit-border-radius: 100px ;
	border-radius: 100px;

}
</style>
</style>
</head>
<body>
<?php
if(isset($_GET['err']))
	{
		echo "<center><table bgcolor=\"#f3ce76\"><tr><td>";
		if($_GET['err']=="0")
		{
			echo "<div class=\"txtErr\">Success";
		}
		else if($_GET['err']=="1")
		{
			echo "<div class=\"txtErr\">Failed</div>";
		}
		echo "</td></tr></table></center>";
	}
	?>
       <div id="oval">
<form action="sekolah.php" method="post" name="user">
  <div align="center"><b>NAMA</b><br/>
    <br/>
    <input type="text" name="nama" >
    <br/><br>
    <input type="submit" value="SEARCH">
    <a href="addsekolah.php"><input name="button" type="button" value=" ADD SEKOLAH"></a>
    <input type="submit" value="VIEW ALL">
  </div>
</form>
</div>
<?php
if(isset($_POST['nama']) && $jml > 0)
{
?>
<div align="left">
 <table>
	  <tr bgcolor="#d3dce3">
	  <th width="23"><div align="center">ID</div></th>
	  <th width="200"><div align="center">NAMA SEKOLAH</div></th>
	  <th width="120"><div align="center">TINGKATAN</div></th>
	  <th width="120"><div align="center">KATEGORI SEKOLAH</div></th>
	  <th width="120"><div align="center">SHOW ATLIT</div></th>
	  </tr>
	      <?php
	$i=0;
	while($row=mysqli_fetch_array($query))
	{
		?>
	      <tr align="center" bgcolor="<?php if($i%2==0) echo "#e5e5e5"; else echo "#d5d5d5";?>" style="cursor:pointer" onMouseOver="this.style.backgroundColor='#bbebc6';" onMouseOut="this.style.backgroundColor='<?php if($i%2==0) echo "#e5e5e5"; else echo "#d5d5d5";?>';">
          	        <td>
	          <?=$row[0]?>	</td>
	        <td align="left">
	          <a href="addatlet.php?idsekolah=<?=$row[0]?>&sekolah=<?=$row[1]?>&tingkatan=<?=$row[2]?>&kategori=<?=$row[3]?> "><?=$row[1]?></a></td>
              <td align="left">
	          <?=$row[2]?>	</td>
			  <td align="left">
	          <?=$row[3]?>	</td>
			  <td align="left">
	          <a href="showatlitbysekolah.php?idsekolah=<?=$row[0]?>&sekolah=<?=$row[1]?>&tingkatan=<?=$row[2]?>">SHOW</a></td>
	        <td width="25">
		<a class="style1"  style="cursor:pointer" onClick="window.location.href='editsekolah.php?id=<?=$row[0]?>'"><img src="gambar/b_edit.png" width="24" height="23" /> </a>		</td>
		<td width="44">
         <a href="javascript:if(confirm('Anda yakin akan menghapus data <?php echo 'Id ='; echo $row['0']; echo 'Nama ='; echo $row['1'] ; ?>??')){document.location='delsekolah.php?id=<?php echo $row['0']; ?>';}"> <img src="gambar/b_drop.png" width="25" height="24"/></a>
	</td>
    </tr>
<?php
	$i++;
	}
}
?>
        </table>
</div>

<p>&nbsp;</p>
</body>
</html>

