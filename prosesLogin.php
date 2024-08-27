<?php

$con = mysqli_connect('localhost', 'root', '', 'nico');
    if (mysqli_connect_errno()) 
    {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

if(isset($_POST['login']))
{
    include('db.php');
    
    $username = $_POST['Username'];
    $password = $_POST['Password'];

    $query = mysqli_query($con,"SELECT * FROM user WHERE username = '$username' && password = '$password' Limit 1 ") or die(mysqli_error($con));

    if(mysqli_num_rows($query) == 0)
    {
        echo '<script>alert("Username not Found!"); window.location = "login_page.php"</script>';
    }
    else 
    {
        $user= mysqli_fetch_assoc($query);
        if($user)
        {
            session_start();
            $_SESSION['isLogin'] = true;
            $_SESSION['user'] = $user;
            echo '<script>alert("success"); window.location = "Home.php"</script>';
        }
        else {
            echo '<script>alert("Username or Password Invalid!"); window.location = "login_page.php"</script>';
        }
    }



}
else{
    echo '<script> window.history.back() </script>';
}

?>
