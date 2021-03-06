<?php
require_once('config/config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo COMPANY_NAME ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#"><?php echo COMPANY_NAME ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="boeken.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Boekenlijst
                </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Alle boeken</a>
                        <div class="dropdown-divider"></div>
                        <?php
                        foreach (range('0', '9') as $column) {
                        ?>
                            <a class="dropdown-item" href="boeken.php?startsWith=<?php echo $column ?>"><?php echo $column ?></a>
                        <?php
                        }
                        ?>
                        <div class="dropdown-divider"></div>
                        <?php
                        foreach (range('A', 'Z') as $column) {
                        ?>
                            <a class="dropdown-item" href="boeken.php?startsWith=<?php echo $column ?>"><?php echo $column ?></a>
                        <?php
                        }
                        ?>
                    </div>
                </li>
                <a class="nav-item nav-link" href="#"></a>
                <?php
                if (!isset($_SESSION['userId'])) {
                ?>
                    <a class="nav-item nav-link" href="#">Login</a>
                    <a class="nav-item nav-link" href="#">Register</a>
                <?php
                } else {
                ?>
                    <a href="#" class="nav-item nav-link">Welkom, <?php echo $_SESSION['userName'] ?></a>
                <?php
                }
                ?>
            </div>
        </div>
    </nav>