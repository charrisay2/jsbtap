<?php
require_once "../db.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM students WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        header("Location: ../Read/index.php");
    } else {
        echo "Lỗi xóa: " . mysqli_error($conn);
    }
} else {
    header("Location: ../Read/index.php");
}
?>