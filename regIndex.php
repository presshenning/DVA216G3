<?php
include('registrate.php'); // Includes Login Script
?>
<!DOCTYPE html>
<html>
<head>
<title>Registration page</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="main">
<div id="login">
<h2>Registration</h2>
<form action="" method="post">
<label>Email :</label>
<input class="text" name="email" placeholder="email" type="text">
<label>UserName :</label>
<input class="text" name="username" placeholder="username" type="text">
<label>Password :</label>
<input class="password" name="fpass" placeholder="**********" type="password">
<label>Password again :</label>
<input class="password" name="lpass" placeholder="**********" type="password">
<input name="submit" type="submit" value=" Login ">
<span><?php echo $error; ?></span>
</form>
</div>
</div>
</body>
</html>