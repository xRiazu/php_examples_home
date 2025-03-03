<?php
$hn = "localhost";
$un = "uzairmoh_admin";
$pw = "*fsn.]V!soR4]R7H";
$db = "music_um";
// Create database connection
$conn = new mysqli($hn, $un, $pw, $db);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
else echo 'connection successful';
?>