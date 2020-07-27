<?php
include "./pdo.php";

$longdb2 = new LongDB2([
    'host' => 'localhost',
    'db' => 'long',
    'user' => 'root',
    'pass' => '',
]);

$row_per_page = 5; // so dong hien thi o 1 trang
$page = isset($_GET['page']) ? $_GET['page'] : 1; // trang hien tai

$tong_so_trang = $longdb2->lay_tong_so_trang($row_per_page); // tong so trang
$dssp = $longdb2->lay_dssp($page, $row_per_page); // danh sach san pham cua trang hien tai

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>xuat bang php</title>
    <script src="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        ul li{
            display: inline-block;
        }
        ul li a{
            padding: 10px;
            border: 1px gray solid;
            background-color: yellow;
        }
        .red{
            color: red;
            font-weight: bold;
            font-size: 2em; 
        }
    </style>
</head>

<body>

    <table class="table table-dark">
        <tr>
            <th scope="col">id</td>
            <th scope="col">ten</td>
            <th scope="col">ngay_sx</td>

        </tr>
        <?php
        foreach ($dssp as $sp) {
            echo "<tr>";
            echo "<td>" . $sp['id_sp'] . "</td>";
            echo "<td>" . $sp['ten'] . "</td>";
            echo "<td>" . $sp['ngay_sx'] . "</td>";
            echo "<td><a href='update.php?id_sp=" . $sp["id_sp"] . "'>cap nhat</a></td>";
            echo "<td><a href='xoa_date.php?id_sp=" . $sp["id_sp"] . "'>xoa</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    </table>

    <ul>
        <?php
        for ($ipage = 1; $ipage <= $tong_so_trang; $ipage++) {
            $class = ($page == $ipage) ? "red" : "";
        ?>
            <li><a class="<?= $class ?>" href="du_lieu.php?page=<?= $ipage ?>"><?= $ipage ?></a></li>
        <?php
        }
        ?>
    </ul>
</body>

</html>