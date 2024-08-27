<?php
// https://www.malasngoding.com
// memanggil library php qrcode
include "phpqrcode/qrlib.php"; 
 
// isi qrcode yang ingin dibuat. akan muncul saat di scan
$isi = 'https://drive.google.com/file/d/1FJluQHcjtKqXDqrKRm8oFui0FiXPxB7p/view?usp=drivesdk'; 
 
// perintah untuk membuat qrcode dan menampilkannya secara langsung dengan format .PNG
QRcode::png($isi); 
?>