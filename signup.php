<?php
//signup.php
include 'connect.php';
include 'header.php';
 
echo '<h3>Sign up</h3>';
 
if($_SERVER['REQUEST_METHOD'] != 'POST') {
    /*the form hasn't been posted yet, display it
      note that the action="" will cause the form to post to the same page it is on */
    echo '<form method="post" action="">
        Username: <input type="text" name="user_name" required/>
        Password: <input type="password" name="user_pass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Es wissts doch wias lauft, mind. oa zahl und oan groß und oan kleinbuchstaben, außerdem mindestens 8 zeichen!" required>
        Password again: <input type="password" name="user_pass_check" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Es wissts doch wias lauft, mind. oa zahl und oan groß und oan kleinbuchstaben, außerdem mindestens 8 zeichen!" required>
        E-mail: <input type="email" name="user_email">
        <input type="submit" value="Add category" />
     </form>';
}
else {
    if ($_POST['user_pass'] != $_POST['user_pass_check']) {
        die("1 nicer try dome ;)");
    }
    $sql = "insert into users
    (user_name, user_pass, user_email, user_date, user_level, online) 
    VALUES('" . $_POST['user_name'] . "',
                        '" . sha1($_POST['user_pass']) . "',
                        '" . $_POST['user_email'] . "',
                            NOW(),
                            0,
                            false)";

if (mysqli_query($con, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
include 'footer.php';
?>