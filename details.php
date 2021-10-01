<?php
require_once('config/database.php');
include('includes/header.php');
$id = $_GET["id"];
?>
<div class="container">
    <div class="row">
        <?php
        $sql = "SELECT * FROM books WHERE id=$id";
        $result = $dbconn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $title = $row["title"];
            $overview = $row["overview"];
            echo $title . "<br>" . $overview;
        } else {
        ?>
            <div class="error">
                <p>Geen resultaten.</p>
            </div>
        <?php
        }
        ?>
    </div>
    <form action="" method="post">
        <label for="start">Start date:</label>

        <input type="date" id="start" name="trip-start" value="2018-07-22" min="2018-01-01">
    </form>
</div>

<?php
include('includes/footer.php');
?>