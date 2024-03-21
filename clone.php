<?php
require_once 'config.php';
require_once 'connect.php';
$id = $_GET['id'];
$sql = "SELECT * FROM articles WHERE article_id = $id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$title = $row['title'];
$content = $row['content'];
$image = $row['image'];
$datetime = date('Y-m-d H:i:s');
$sql = "INSERT INTO articles(title, content, image, updated_at, created_at) VALUES ('$title', '$content', '$image', '$datetime', '$datetime')";
mysqli_query($conn, $sql);
header('Location: ' . $WEBSITE_URL);