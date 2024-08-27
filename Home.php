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
                        <li class="isActive"><a href="Home.php"><p>Home</p></a></li>
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
        <div id="dashboardData" style="font-size:100px">
            Welcome to Perbasi Kudus<br>
            <img src="gambar/download.jpg" position="fixed" width="1250" height="500">
        </div>
    </body>
    <script src="script_home.js"></script>
</html>
