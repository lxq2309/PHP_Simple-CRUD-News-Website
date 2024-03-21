<?php
require_once 'connect.php';
require_once 'config.php';
$title = $_POST['title'];
$content = $_POST['content'];
$image = $_POST['image'];
$datetime = date('Y-m-d H:i:s');
$sql = "INSERT INTO articles (title, content, image, created_at, updated_at) VALUES ('$title', '$content', '$image', '$datetime', '$datetime')";
if (mysqli_query($conn, $sql)) {
    header('Location: ' . $WEBSITE_URL);
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}