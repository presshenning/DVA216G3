<?php 
    require_once ("Includes/session.php");
    require_once ("Includes/connection_info.php"); 
    require_once ("Includes/connect_database.php");
    include ("Includes/header.php");

    if (isset($_POST['submit']))
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = "SELECT username FROM users WHERE username = ? AND password = ? LIMIT 1";
        $statement = $databaseConnection->prepare($query);
        $statement->bind_param('ss', $username, $password);

        $statement->execute();
        $statement->store_result();

        if ($statement->num_rows == 1)
        {
            $statement->bind_result($_SESSION['userid'], $_SESSION['username']);
            $statement->fetch();
            header ("Location: index.php");
        }
        else
        {
            echo "Username/password combination is incorrect.";
        }
    }
?>
<div>
    <h2>Log on</h2>
        <form action="login.php" method="post">
            <label>Log on</label>
                    <label for="username">Username:</label> 
                    <input type="text" name="username" value="" id="username" />
                    <label for="password">Password:</label>
                    <input type="password" name="password" value="" id="password" />
            <input type="submit" name="submit" value="Submit" />
            <p>
                <a href="index.php">Cancel</a>
            </p>
    </form>
</div>
<?php include ("Includes/footer.php"); ?>