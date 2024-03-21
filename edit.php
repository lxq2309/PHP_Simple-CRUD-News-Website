<?php
require_once 'connect.php';
require 'config.php';
$id = $_GET['id'];
$sql = "SELECT * FROM articles where article_id = $id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa bài đăng <?php echo $row['title'] ?> -
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
    <h1>Sửa bài đăng <?php echo '"'. $row['title'] . '"' ?></h1>
    <form method="POST" action="<?php echo $WEBSITE_URL . '/process_update.php' ?>">
        <label for="title">Tiêu đề:</label><br>
        <input type="text" id="title" name="title" value="<?php echo $row['title'] ?>"><br>
        <label for="content">Nội dung:</label><br>
        <textarea id="content" name="content"><?php echo $row['content'] ?></textarea><br>
        <label for="title">Link ảnh:</label><br>
        <input type="text" id="image" name="image" value="<?php echo $row['image'] ?>"><br><br>
        <input type="hidden" name="id" value="<?php echo $row['article_id'] ?>">
        <input type="submit" value="Sửa">
    </form>
    <br>
    <br>
    <a href="<?php echo $WEBSITE_URL ?>">Quay lại trang chủ</a>

</body>

</html>
<?php
mysqli_close($conn);
?>