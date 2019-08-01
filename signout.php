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
    include "header.php";

    //User als offline hinterlegen
    $sql = "UPDATE users 
    SET online = false
    WHERE user_name = '" . $_SESSION['user_name'] . "'
    ";

    if (mysqli_query($con, $sql)) {
        echo "Sie wurden abgemeldet!";
        echo "<p>Zurück zur <a href='./index.php'>Hauptseite</a></p>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    include "footer.php";
    session_destroy();
    ?>
</body>
</html>