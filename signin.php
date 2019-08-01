<?php
session_start();
//signin.php
include 'connect.php';
include 'header.php';
 
echo '<h3>Sign in</h3>';
 
//first, check if the user is already signed in. If that is the case, there is no need to display this page
if($_SESSION['signed_in'] == true)
{
    echo 'Du bist bereits ogmeldt oba du kannst di gern <a href="signout.php">ausloggen</a> wennst mogst.';
} else
{
    if($_SERVER['REQUEST_METHOD'] != 'POST') {
        /*the form hasn't been posted yet, display it
          note that the action="" will cause the form to post to the same page it is on */
        echo '<form method="post" action="">
            Username: <input type="text" name="user_name" required />
            Password: <input type="password" name="user_pass" required>
            <input type="submit" value="Sign in" name="loginbtn" />
         </form>';

         
    } else {

        //the form has been posted without errors, so save it
            //notice the use of mysql_real_escape_string, keep everything safe!
            //also notice the sha1 function which hashes the password

        $sql = "SELECT user_id, user_name, user_level 
        FROM users 
        WHERE user_name = '" . $_POST['user_name'] . "' 
        AND user_pass = '" . sha1($_POST['user_pass']) . "'";

        $dberg = mysqli_query($con, $sql);
        $row = mysqli_fetch_object($dberg);

        if (!empty($row)) {
        //set the $_SESSION['signed_in'] variable to TRUE
        $_SESSION['signed_in'] = true;
        //we also put the user_id and user_name values in the $_SESSION, so we can use it at various pages
        
            $_SESSION['user_id']  = $row->user_id;
            $_SESSION['user_name']  = $row->user_name;
            $_SESSION['user_level'] = $row->user_level;

        //User als online hinterlegen
            $sql = "UPDATE users 
            SET online = true
            WHERE user_name = '" . $_SESSION['user_name'] . "'
            ";
        
        if (mysqli_query($con, $sql)) {
            echo "Servus und ";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        echo 'Willkommen, ' . $_SESSION['user_name'] . '. <p>Zur <a href="index.php">Hauptseite</a>.</p>';
        }

    } else {
        //something went wrong, display the error
        echo 'Ebsed is schiaf gloffa, bitte ibapriaf deine Eingaben.';
        //echo mysql_error(); //debugging purposes, uncomment when needed
        }

        mysqli_close($con);
        }
    }
        include 'footer.php';
?>