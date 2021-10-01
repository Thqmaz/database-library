<?php
$dbhost = DB_HOST;
$dbuser = DB_USER;
$dbpass = DB_PASS;
$dbname = DB_NAME;

try {
    $dbconn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
} catch (Exception $e) {
    echo "Error while connecting to the database: " . $e->getMessage();
}

return $dbconn;