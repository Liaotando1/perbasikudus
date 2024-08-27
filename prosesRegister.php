<?php

$con = mysqli_connect('localhost', 'root', '', 'nico');
    if (mysqli_connect_errno()) 
    {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

if(isset($_POST['store']))
{
    include('db.php');
    
    $username = $_POST['Username'];
    $email = $_POST['Email'];
    $password = $_POST['Password'];

    $input = mysqli_query($con,"INSERT INTO user(username,email,password) VALUES ('$username','$email','$password')") or die(mysqli_error($con));

    if($input)
    {
        echo '<script>alert("success"); window.location = "login_page.php"</script>';
    }
    else {
        echo '<script>alert("success"); window.location = "login_page.php"</script>';
    }



}
else{
    echo '<script> window.history.back() </script>';
}

?>
