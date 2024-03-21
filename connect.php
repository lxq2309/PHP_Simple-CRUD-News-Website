<?php
$conn = null;
try {
    $conn = mysqli_connect('localhost', 'root', '', 'simple_crud_news_db');
} catch (Throwable $th) {
    die ('Không thể kết nối đến server, lỗi: ' . $th->getMessage());
}