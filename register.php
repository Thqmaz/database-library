<?php
include('includes/header.php');
require_once('config/database.php');
if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $repeatPassword = $_POST['password2'];
    if ($password != $repeatPassword) {
        die("Wachtwoorden komen niet overeen");
    }
    $password = password_hash($password, PASSWORD_DEFAULT);

    $existCheck = $dbconn->prepare("SELECT * FROM user WHERE name='$username'");
    if ($existCheck === false) {
        die("Gebruikersnaam bestaat al");
    } else {
        $result = $dbconn->prepare("INSERT INTO user(name, password) VALUES (?, ?)");
        if ($result === false) {
            echo mysqli_error($dbconn);
        } else {
            $result->bind_param('ss', $username, $password);
            if ($result->execute()) {
                echo "Succesvol geregistreerd. U word doorgeleid.";
            } else {
                echo "error";
            }
        }
    }
}
?>

<form action="" method="post">
    Gebruikersnaam<input type="text" name="username" required><br />
    Wachtwoord<input type="password" name="password" required><br />
    Herhaal wachtwoord<input type="password" name="password2" required><br />
    <input type="submit" name="register" value="Registreer">
</form>