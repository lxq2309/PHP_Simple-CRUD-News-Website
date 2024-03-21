<?php
require_once 'config.php';
require_once 'connect.php';
$id = $_GET['id'];
$sql = "DELETE FROM articles WHERE article_id = $id";
if (mysqli_query($conn, $sql))
{
    header('Location: ' . $WEBSITE_URL);
}
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}