<?php
require_once 'connect.php';
require 'config.php';

$searchText = null;
if (isset ($_GET['search'])) {
    $searchText = $_GET['search'];
}
$sql = "SELECT COUNT(*) FROM articles WHERE title LIKE '%$searchText%'";
$result = mysqli_query($conn, $sql);
$totalCount = mysqli_fetch_column($result);
$pageSize = 5;
$pageCount = ceil($totalCount / $pageSize);
$pageNumber = 1;
$recordInPage = 0;
if (isset ($_GET['page'])) {
    $pageNumber = $_GET['page'];
}
$offset = $pageSize * ($pageNumber - 1);

$sql = "SELECT * FROM articles WHERE title LIKE '%$searchText%' LIMIT $pageSize OFFSET $offset";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo $WEBSITE_DESCRIPTION; ?>">
    <title>
        <?php echo ($searchText != null ? "Kết quả tìm kiếm $searchText" : "$WEBSITE_TITLE") . ($pageNumber != 1 ? " - Trang $pageNumber": '') ?>
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

        a.active {
            display: inline-block;
            padding: 5px;
            border: 1px solid blue;
            background-color: aqua;
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
        <div class="search">
            <form action="" method="GET">
                <input type="text" name="search">
                <input type="submit" value="Tìm">
            </form>


        </div>
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
                        <?php $recordInPage++ ?>
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
        <div>
            <?php for ($i = 1; $i <= $pageCount; $i++) { ?>
                <a class="<?php echo ($pageNumber == $i ? 'active' : '') ?>"
                    href="<?php echo $WEBSITE_URL . '/?page=' . $i . '&search=' . $searchText ?>">
                    <?php echo $i ?>
                </a>
            <?php } ?>
        </div>
        <div>
            <p>Hiển thị
                <?php echo $recordInPage ?> bản ghi trong tổng số
                <?php echo $totalCount ?> bản ghi
            </p>
        </div>
    </div>

    <div class="footer">
        <p>Copyright 2024</p>
    </div>

</body>

</html>

<?php
mysqli_close($conn);
?>