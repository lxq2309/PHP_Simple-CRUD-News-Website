<?php
require_once 'connect.php';
require_once 'config.php';
$id = $_POST['id'];
$title = $_POST['title'];
$content = $_POST['content'];
$image = $_POST['image'];
$datetime = date('Y-m-d H:i:s');
$sql = "UPDATE articles SET title = '$title', content = '$content', image = '$image', updated_at = '$datetime' WHERE article_id = $id";
if (mysqli_query($conn, $sql)) {
    header('Location: ' . $WEBSITE_URL);
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}