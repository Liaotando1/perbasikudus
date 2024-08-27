<?php
include "database.php";
ini_set('error_reporting', E_ALL & ~E_NOTICE);

$querya = mysqli_query($conn,"SELECT * FROM sekolah order by id_sekolah asc limit 10"); 
		$jmla = mysqli_num_rows($querya);
if($jmla > 0) 
{
?>
       <div align="center">
	     <table>
	  <tr bgcolor="#d3dce3">
	  <th width="200"><div align="center">NAMA SEKOLAH</div></th>
	  <th width="120"><div align="center">TINGKATAN</div></th>
	  <th width="120"><div align="center">KATEGORI SEKOLAH</div></th>
	  </tr>
	      <?php
	$i=0;
	while($row=mysqli_fetch_array($querya))
	{
		?>
	      <tr align="center" bgcolor="<?php if($i%2==0) echo "#e5e5e5"; else echo "#d5d5d5";?>" style="cursor:pointer" onMouseOver="this.style.backgroundColor='#bbebc6';" onMouseOut="this.style.backgroundColor='<?php if($i%2==0) echo "#e5e5e5"; else echo "#d5d5d5";?>';">
	        <td>
	          <?=$row[1]?>	</td>
	        
	        <td align="left">
	          <?=$row[2]?>	</td>
              <td align="left">
	          <?=$row[3]?>	</td>
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