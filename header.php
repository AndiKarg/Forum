<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//DE"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de" lang="de">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="description" content="A short description." />
    <meta name="keywords" content="put, keywords, here" />
    <title>Des Social Network des mir persönlich am bestn gfoid</title>
    <link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
<h1>1 nice Social Network</h1>
    <div id="wrapper">
        <div id="menu">
                <a class="item" href="http://ux5.edvschulen-plattling.de/~akarg/Forum/index.php">Home</a> -
                <a class="item" href="">Reload</a> -
                <a class="item" href="">Placeholder lol</a>

                
                    <div id="userbar">
                        <?php
                        session_start();
                            if($_SESSION['signed_in'] == true)
                            {
                                echo 'Servus, ' . $_SESSION['user_name'] . '. Bimstas ned du? <a href="signout.php">Auslokken</a>';
                            }
                            else
                            {
                                echo '<a href="signin.php">Sign in</a> or <a href="signup.php">create an account</a>.';
                            }
                            ?>
                    </div>
                
            </div>
        <div id="content">