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
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie-edge">
        <link rel="stylesheet" href="style_home.css">
        <title>PERBASI KUDUS</title>
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
                        <li class="isActive"><a href="showatletsmaputri.php"><p>SMA Putri</p></a></li>
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
            <td>
                <input type="button" value="ADD SEKOLAH" onClick="window.location.href='addsekolah.php'"> 
            </td>
            <br>
            <br>
            <td>  
                <input type="button" value="ADD ATLET" onClick="window.location.href='addatlet.php'"> 
            </td>
            <br>
            <br>
            

<?php
include "database.php";
ini_set('error_reporting', E_ALL & ~E_NOTICE);

$querya = mysqli_query($conn,"SELECT * FROM atlit  where nama_sekolah like 'SMA%' and jenis_kelamin like 'PEREMPUAN'"); 
		$jmla = mysqli_num_rows($querya);
if($jmla > 0) 
{
?>
       <div align="center">
	     <table>
	  <tr bgcolor="#d3dce3">
	  <th width="300"><div align="center">NAMA ATLIT</div></th>
	<th width="160"><div align="center">NIK</div></th>
 	<th width="200"><div align="center">TEMPAT, TANGGAL LAHIR</div></th>
	  <th width="152"><div align="center">JENIS KELAMIN</div></th>
	  <th width="100"><div align="center">TB / BB</div></th>
      <th width="100"><div align="center">POSISI</div></th>
      <th width="100"><div align="center">JERSEY</div></th>
      <th width="100"><div align="center">FOTO</div></th>
      <th width="71"><div align="center">CREATED AT</div></th>
	 </tr>
	      <?php
	$i=0;
	while($row=mysqli_fetch_array($querya))
	{
        $tanggal = date_format(new DateTime($row[7]),'d-m-y');
		?>
	      <tr align="center" bgcolor="<?php if($i%2==0) echo "#e5e5e5"; else echo "#d5d5d5";?>" style="cursor:pointer" onMouseOver="this.style.backgroundColor='#bbebc6';" onMouseOut="this.style.backgroundColor='<?php if($i%2==0) echo "#e5e5e5"; else echo "#d5d5d5";?>';">
	        <td align="left">
	          <?=$row[4]?>	</td>
	        <td align="left">
	          <?=$row[5]?></td>
                <td>
	          <?=$row[6] .', '. $tanggal?></td>
               <td align="left">
	          <?=$row[8]?></td>
	        <td align="left">
	          <?=$row[9]?>CM/<?=$row[10]?>KG</td>
	        <td>
	         <?=$row[11]?>	</td>                   
                      <td>
	          <?=$row[12]?>	</td>
              <td>
              
              <img src="<?=$row[13]?>" width="45" height="60">	
              <br><a href='gambarlabgigi1.php?id=<?php echo $row[0] ?>&nama=<?php echo $row[1] ?>'>Edit FT</a>
              </td>
              <td>
               <?=$row[14]?>	</td>
                              
         
                     
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
			</div>
    </body>
    <script src="script_home.js"></script>
</html>