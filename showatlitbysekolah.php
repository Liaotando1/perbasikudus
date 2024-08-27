<?php
include "database.php";
ini_set('error_reporting', E_ALL & ~E_NOTICE);

$querya = mysqli_query($conn,"SELECT * FROM atlit  where nama_sekolah like '%'"); 
		$jmla = mysqli_num_rows($querya);
if($jmla > 0) 
{
?>
       <div align="center">
	     <table>
	  <tr bgcolor="#d3dce3">
	  <th width="300"><div align="center">NAMA ATLIT</div></th>
	<th width="160"><div align="center">NIK</div></th>
 	<th width="150"><div align="center">TEMPAT</div></th>
      <th width="264"><div align="center">TANGGAL LAHIR</div></th>
	  <th width="152"><div align="center">JENIS KELAMIN</div></th>
	  <th width="100"><div align="center">T / B</div></th>
      <th width="100"><div align="center">POSISI</div></th>
      <th width="100"><div align="center">JERSEY</div></th>
      <th width="100"><div align="center">FOTO</div></th>
      <th width="71"><div align="center">CREATED AT</div></th>
	 </tr>
	      <?php
	$i=0;
	while($row=mysqli_fetch_array($querya))
	{
		?>
	      <tr align="center" bgcolor="<?php if($i%2==0) echo "#e5e5e5"; else echo "#d5d5d5";?>" style="cursor:pointer" onMouseOver="this.style.backgroundColor='#bbebc6';" onMouseOut="this.style.backgroundColor='<?php if($i%2==0) echo "#e5e5e5"; else echo "#d5d5d5";?>';">
	        <td align="left">
	          <?=$row[4]?>	</td>
	        <td align="left">
	          <?=$row[5]?></td>
                      <td>
	          <?=$row[6]?></td>
	        <td>
	          <?=$row[7]?></td>
               <td align="left">
	          <?=$row[8]?></td>
	        <td align="left">
	          <?=$row[9]?>CM/<?=$row[10]?>KG</td>
	        <td>
	         <?=$row[11]?>	</td>                   
                      <td>
	          <?=$row[12]?>	</td>
              <td>
               <?=$row[13]?>	</td>
                   <td>
               <?=$row[14]?>	</td>
                              
         
                     <td><a href='gambarlabgigi1.php?id=<?php echo $row[0] ?>&nama=<?php echo $row[1] ?>'>Edit FT</a>
              
	      <img src="<?=$row[13]?>" width="45" height="60">	</td>
             <td width="25">
		<a class="style1"  style="cursor:pointer" onClick="window.location.href='editatlet.php?id=<?=$row[0]?>'"><img src="gambar/b_edit.png" width="24" height="23" /> </a>		</td>
		<td width="44">
         <a href="javascript:if(confirm('Anda yakin akan menghapus data <?php echo 'Id ='; echo $row['0']; echo 'Nama ='; echo $row['1'] ; ?>??')){document.location='delatlet.php?id=<?php echo $row['0']; ?>';}"> <img src="gambar/b_drop.png" width="25" height="24"/></a>
	</td>
    </tr>
<?php
	$i++;
	}
}
?>
        </table>
<html>
<head>
<title>DANDIM CUP 2019</title>