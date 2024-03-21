<?php
require_once 'connect.php';
require 'config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tạo bài đăng mới -
        <?php echo $WEBSITE_TITLE ?>
    </title>
    <style>
        textarea {
            width: 100%;
            height: 500px;
        }

        input[type="text"] {
            width: 100%;
        }
    </style>
</head>

<body>
    <h1>Tạo bài đăng mới</h1>
    <form method="POST" action="<?php echo $WEBSITE_URL . '/process_insert.php' ?>">
        <label for="title">Tiêu đề:</label><br>
        <input type="text" id="title" name="title"><br>
        <label for="content">Nội dung:</label><br>
        <textarea id="content" name="content"></textarea><br>
        <label for="title">Link ảnh:</label><br>
        <input type="text" id="image" name="image"><br><br>
        <input type="submit" value="Tạo">
    </form>
    <br>
    <br>
    <a href="<?php echo $WEBSITE_URL ?>">Quay lại trang chủ</a>

</body>

</html>
<?php
mysqli_close($conn);
?>