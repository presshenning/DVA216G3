<?php
    $title="Registration";
    require_once ("Includes/session.php");
    require_once ("Includes/connection_info.php"); 
    require_once ("Includes/connect_database.php");
    include("Includes/header.php");

    $error=''; // Variable To Store Error Message
    if (isset($_POST['submit'])) 
    {
       // To protect MySQL injection for Security purpose
        $username = stripslashes($_POST['username']);
        $email = stripslashes($_POST['email']);
        $password = stripslashes($_POST['fpass']);

        $username = mysqli_real_escape_string($databaseConnection, $username);
        $email = mysqli_real_escape_string($databaseConnection, $email);
        $password = mysqli_real_escape_string($databaseConnection, $password);

        $query = "INSERT INTO users (username, password, email) VALUES(?,?,?)";
        $statement = $databaseConnection->prepare($query);
        $statement->bind_param('sss', $username, $password, $email);
        $result = $statement->execute();

                if ($result) 
                {
                    $error = "success!"; // Initializing Session
                   // header("location: profile.php"); // Redirecting To Other Page
                } 
                else 
                {
                    $error = "Registration failed";
                }
                $statement->close();
       mysql_close($connection); // Closing Connection
}
?>
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