<?php
include('includes/header.php');
require_once('config/database.php');
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $formPassword = $_POST['password'];

    $existCheck = $dbconn->prepare("SELECT id, name, password FROM user WHERE name='$username'");
    if ($existCheck === false) {
        echo mysqli_error($dbconn);
    } else {
        $existCheck->bind_result($id, $name, $password);

        if (password_verify($password, $formPassword)) {
            die("Wachtwoorden komen overeen");
        } else {
            die("Verkeerde gebruikersnaam/wachtwoord");
        }

    }
}
?>
<form action="" method="post">
    Gebruikersnaam<input type="text" name="username" required><br />
    Wachtwoord<input type="password" name="password" required><br />
    <input type="submit" name="login" value="Log in">
</form>