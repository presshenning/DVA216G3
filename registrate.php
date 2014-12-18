<?php
    require_once ("Includes/session.php");
    require_once ("Includes/connection_info.php"); 
    require_once ("Includes/connect_database.php");
$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) 
    {
        echo "exciting";

        // set input validation instead
       /* if (empty($_POST['username']) || empty($_POST['password'])) 
        {
            $error = "Username or Password is invalid";
            echo " not exciting";
        }
        else
            {*/
                echo " more exciting";
                // Define $username and $password
                $username=$_POST['username'];
                $email=$_POST['email'];
                $password=$_POST['fpass'];
                echo " first pass";
                                echo " $username";
                                echo " $email";
                                echo " $password";
                // Establishing Connection with Server by passing server_name, user_id and password as a parameter

                // To protect MySQL injection for Security purpose
                $username = stripslashes($username);
                $email = stripslashes($email);
                $password = stripslashes($password);
                                                echo " second pass";
                                echo " $username";
                                echo " $email";
                                echo " $password";
                $username = mysqli_real_escape_string($databaseConnection, $username);
                $email = mysqli_real_escape_string($databaseConnection, $email);
                $password = mysqli_real_escape_string($databaseConnection, $password);

                                echo " third pass";
                                echo " $username";
                                echo " $email";
                                echo " $password";
                mysql_select_db("TempDatabase", $databaseConnection);
                // SQL query to fetch information of registered users and finds user match.
               // echo " INSERT INTO users (email, username, password) VALUES('".$email."', '".$username."','".$password."')";
               // $query = mysql_query("INSERT INTO users (username, password, email) VALUES('".$username."', '".$password."', '".$email."')");
                //$rows = mysql_num_rows($query);

                        $query = "INSERT INTO users (username, password, email) VALUES(?, ?, ?)";
        $statement = $databaseConnection->prepare($query);
        $statement->bind_param('sss', $username, $password, $email);
        //$statement->
        $statement->execute();
        $statement->store_result();
        echo $statement->num_rows;
                if ($statement->num_rows == 1) 
                {
                    $_SESSION['login_user']=$username; // Initializing Session
                    echo " huge exciting";
                   // header("location: profile.php"); // Redirecting To Other Page
                } 
                else 
                {
                    $error = "Username or Password is invalid";
                    echo "exciting letdown";
                }

                    echo $error;
                mysql_close($connection); // Closing Connection
}
?>