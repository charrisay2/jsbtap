<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh Sách</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="container" style="max-width: 1000px;">
        <h2>Danh Sách Sinh Viên</h2>
        <a href="../Create/index.php" class="btn btn-add">+ Thêm Mới</a>
        
        <table>
            <tr>
                <th>ID</th>
                <th>Họ Tên</th>
                <th>Tuổi</th>
                <th>Email</th>
                <th>SĐT</th>
                <th>Địa chỉ</th>
                <th>Giới tính</th>
                <th>Hành Động</th>
            </tr>
            <?php
            require_once "../db.php";
            $sql = "SELECT * FROM students";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["name"] . "</td>";
                    echo "<td>" . $row["age"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo "<td>" . $row["phone"] . "</td>";
                    echo "<td>" . $row["address"] . "</td>";
                    echo "<td>" . $row["gender"] . "</td>";
                    echo "<td>
                            <a href='../Update/index.php?id=" . $row["id"] . "' class='btn btn-edit'>Sửa</a>
                            <a href='../Delete/index.php?id=" . $row["id"] . "' class='btn btn-delete' onclick='return confirm(\"Xóa nha?\")'>Xóa</a>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='8' style='text-align:center'>Chưa có dữ liệu</td></tr>";
            }
            ?>
        </table>
        <a href="../index.php" class="btn btn-home">🏠 Về Trang Chủ</a>
    </div>
</body>
</html>