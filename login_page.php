<?php
session_start();

if(!empty($_SESSION['isLogin']))
{
    header("location: Home.php");
}

echo'
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="./css/bulma.min.css">
<link rel="stylesheet" href="./css/styleee.css">
<title>Login Page</title>
</head>
<body>
<div class="backgroundAll"></div>
<nav class="navbar" role="navigation" aria-label="main navigation">
<div class="navbar-brand">
<a class="navbar-item" href="./">
<img src="https://bulma.io/images/bulma-logo.png" width="112"
height="28">
</a>
</div>
</nav>
<div class="columns" style="margin-top: 80px;">
<div class="column is-one-quarter" style="margin:auto;">
<div class="card">
<header class="card-header">
<p class="card-header-title">
Login Page
</p>
</header>
<form action="prosesLogin.php" method="POST">
    <div class="card-content">
    <div class="field">
    <p class="control">
    <label class="label">Username</label>
    <input class="input" type="text"
    placeholder="Username" name="Username">
    </p>
    </div>
    <div class="field">
    <p class="control">
    <label class="label">Password</label>
    <input class="input" type="password"
    placeholder="Password" name="Password">
    </p>
    </div>
    </div>
    <footer class="card-footer">
    <input name="login" type="submit" value="Log In"
    style="padding: 0px !important" class="card-footer-item is-link button">
    </footer>
</form>

</div>
<small>New to My Site ? <a href="./register_page.php">Sign Up
Now</a></small>
</div>
</div>
</body>
</html>';

?>