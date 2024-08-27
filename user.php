<?php
include "database.php";
ini_set('error_reporting', E_ALL & ~E_NOTICE);
if(isset($_POST['username']))
{
	if($_POST['username']!="")
	{
		$query = mysqli_query($conn,"SELECT * FROM user WHERE username LIKE '%".$_POST['username']."%' OR username LIKE '%".$_POST['username']."%' and username!='reza' ORDER BY username ASC");
		$jml = mysqli_num_rows($query);
	}
	else
	{
		$query = mysqli_query($conn,"SELECT * FROM user order by username ASC");
		$jml = mysqli_num_rows($query);
	}
}
?>
<html>
<head>
<title>USER</title>
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
<form action="user.php" method="post" name="user">
  <div align="center"><b>NAMA</b><br/>
    <br/>
    <input type="text" name="username" id="username">
    <br/>
    <input type="submit" value="SEARCH">
    <a href="adduser.php"><input name="button" type="button" value=" ADD USER"></a>
    <input type="submit" value="VIEW ALL">
  </div>
</form>
</div>
<?php
if(isset($_POST['username']) && $jml > 0)
{
?>
<div align="left">
<table width="552" cellpadding="4" cellspacing="4">
  <tr bgcolor="#d3dce3">
    <th width="219"> Username </th>
    <th width="219"> Sekolah </th>
    <th width="72"></th><th width="72"></th>
  </tr>
  <?php
	$i=0;
	while($row=mysqli_fetch_array($query))
	{
?>
  <tr align="center" bgcolor="<?php if($i%2==0) echo "#e5e5e5"; else echo "#d5d5d5";?>" style="cursor:pointer" onMouseOver="this.style.backgroundColor='#bbebc6';" onMouseOut="this.style.backgroundColor='<?php if($i%2==0) echo "#e5e5e5"; else echo "#d5d5d5";?>';">
    <th align="left"> <?=$row[1]?>
    </th>
    <th align="left"> <?=$row[4]?>
    </th>
    <td><a class="style1" style="cursor:pointer" onClick="window.location.href='edituser2.php?id=<?=$row[0]?>'"><img src="gambar/b_edit.png"></a> </td>
    <td>	 
       <a href="javascript:if(confirm('Anda yakin akan menghapus data <?php echo 'Nama ='; echo $row['0'] ; ?>??')){document.location='deluser.php?id=<?=$row['0']?>';}"> <img src="gambar/b_drop.png"/></a>
      </td>
  </tr>
  <?php
	$i++;
	}
}
else if(isset($_POST['username']) && $jml <= 0)
	echo "<font color=\"red\">Tidak Ada Data</font>";
	?>
</table>
</div>

<p>&nbsp;</p>
</body>
</html>

