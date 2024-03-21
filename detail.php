<?php
require_once 'config.php';
require_once 'connect.php';

$id = $_GET['id'];
$sql = "SELECT * FROM articles WHERE article_id = $id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php echo $row['title'] ?>
    </title>
</head>

<body>
    <h1>
        <?php echo $row['title'] ?>
    </h1>
    <img src="<?php echo $row['image'] ?>" alt="<?php $row['title'] ?>" width="500px"> </br>
    <p>
        <?php echo nl2br($row['content']) ?>
    </p>
    <a href="<?php echo $WEBSITE_URL ?>">Quay lại trang chủ</a>
</body>

</html>
<?php
mysqli_close($conn);
?>