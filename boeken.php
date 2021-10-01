<?php
include('includes/header.php');
require_once('config/database.php');
if(isset($_GET['startsWith'])) {
    $sqlQuery = "SELECT id, title, author, publisher, overview FROM books WHERE title LIKE '". $_GET['startsWith'] ."%'";
} else {
    $sqlQuery = "SELECT id, title, author, publisher, overview FROM books";
}
?>
<div class="container">
    <div class="row">
        <?php
        $result = $dbconn->prepare($sqlQuery);
        if ($result === false) {
            echo mysqli_error($dbconn);
        } else {
            $result->bind_result($id, $title, $author, $publisher, $overview);
            if ($result->execute()) {
                $result->store_result();
                while ($result->fetch()) {
        ?>
                    <div class="card" style="width:18rem">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $title ?></h5>
                            <p class="card-text"></p>
                            <p class="card-description"><?php echo $overview ?></p>
                            <a href="details.php?id=<?php echo $id ?>" class="btn btn-primary">Bekijk dit boek</a>
                        </div>
                    </div>
        <?php
                }
            }
        }
        ?>
    </div>
</div>
<?php
include('includes/footer.php');
?>