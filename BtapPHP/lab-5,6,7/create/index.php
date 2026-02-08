<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once "../db.php"; 

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $age = mysqli_real_escape_string($conn, $_POST['age']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);

    $sql = "INSERT INTO students (name, age, email, phone, address, gender) 
            VALUES ('$name', '$age', '$email', '$phone', '$address', '$gender')";

    if (mysqli_query($conn, $sql)) {
        header("Location: ../Read/index.php");
        exit();
    } else {
        echo "Lỗi: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thêm Mới</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="container">
        <h2>Thêm Sinh Viên Mới</h2>
        <form method="post">
            <label>Họ Tên:</label> <input type="text" name="name" required>
            <label>Tuổi:</label> <input type="number" name="age" required>
            <label>Email:</label> <input type="text" name="email" required>
            <label>SĐT:</label> <input type="text" name="phone" required>
            <label>Địa chỉ:</label> <input type="text" name="address" required>
            
            <label>Giới tính:</label><br>
            <input type="radio" name="gender" value="Male" checked> Nam
            <input type="radio" name="gender" value="Female"> Nữ
            <br><br>
            
            <input type="submit" class="submit-btn" value="Lưu Dữ Liệu">
        </form>
        <a href="../index.php" class="btn btn-home">🏠 Về Trang Chủ</a>
    </div>
</body>
</html>