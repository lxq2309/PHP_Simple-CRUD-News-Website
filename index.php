<?php
require_once 'connect.php';
require 'config.php';

$sql = 'SELECT * FROM articles';
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo $WEBSITE_DESCRIPTION; ?>">
    <title>
        <?php echo $WEBSITE_TITLE ?>
    </title>

    <style>
        .header {
            text-align: center;
        }

        .footer {
            text-align: center;
        }

        table {
            width: 100%;
            text-align: left;
            border: 1px solid black;
        }

        th,
        td {
            border: 1px solid black;
            padding: 10px;
        }

        th:nth-child(1),
        td:nth-child(1),
        th:nth-child(3),
        td:nth-child(3) {
            text-align: center;
        }

        a {
            text-decoration: none;
        }

        .header h1 a {
            color: black;
        }
    </style>
</head>

<body>

    <div class="header">
        <h1><a href="<?php echo $WEBSITE_URL ?>">
                <?php echo $WEBSITE_TITLE ?>
            </a></h1>
    </div>

    <div class="main">
        <a href="<?php echo $WEBSITE_URL . '/create.php' ?>"><button>Tạo bài đăng mới</button></a>
        <table>
            <thead>
                <th>Mã bài đăng</th>
                <th>Tên bài đăng</th>
                <th>Ảnh</th>
                <th>Thời gian đăng</th>
                <th>Hành động</th>
            </thead>
            <tbody>
                <?php if (mysqli_num_rows($result) > 0) { ?>
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td>
                                <?php echo $row['article_id'] ?>
                            </td>
                            <td>
                                <a href="<?php echo $WEBSITE_URL . '/detail.php?id=' . $row['article_id'] ?>">
                                    <?php echo $row['title'] ?>
                                </a>
                            </td>
                            <td>
                                <img src="<?php echo $row['image'] ?>" alt="<?php echo $row['title'] ?>" width="100">
                            </td>
                            <td>
                                <?php echo $row['created_at'] ?>
                            </td>
                            <td>
                                <a href="<?php echo $WEBSITE_URL . '/clone.php?id=' . $row['article_id'] ?>"><button
                                        style="background-color: blue; color: white;">Nhân bản</button></a>
                                <a href="<?php echo $WEBSITE_URL . '/edit.php?id=' . $row['article_id'] ?>"><button
                                        style="background-color: green; color: white;">Sửa</button></a>
                                <a href="<?php echo $WEBSITE_URL . '/delete.php?id=' . $row['article_id'] ?>"><button
                                        style="background-color: red; color: white;">Xoá</button></a>
                            </td>
                        </tr>
                    <?php } ?>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <div class="footer">
        <p>Copyright 2024</p>
    </div>

</body>

</html>

<?php
mysqli_close($conn);
?>