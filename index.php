<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
session_start();
include "connect.php";
include 'header.php';
?>
    <div class="dashboard">
        <?php
        if($_SERVER['REQUEST_METHOD'] != 'POST') {
        ?>
            <form method="POST" action="">
                <input type="submit" value="Wer is aktuell ois online=">
            </form>
        <?php
        } else {
            $sql = "SELECT user_name, user_level 
            FROM users 
            WHERE online = true";

            $dberg = mysqli_query($con, $sql);

            if (!empty($dberg)) {
                

                   echo "<table style='width:100%'>";
                   echo "<tr>";
                   echo "<th>Username</th>";
                   echo "<th>Userlevel</th>";
                   echo "</tr>";
                
                   while($row = mysqli_fetch_object($dberg)) {
                        echo "<tr>";
                        echo "<td>". $row->user_name ."</td>";
                        echo "<td>". $row->user_level ."</td>";
                        echo "</tr>";
                    }
                   
                
                   echo "</table>";

            }
            else {
                echo "Leider is aktuelle koana online PepeSad";
            }
        }
        ?>
    </div>
<?php
include 'footer.php';
?>
</body>
</html>