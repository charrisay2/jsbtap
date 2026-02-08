<?php

require_once "../db.php";

$id = $_GET['id'] ?? 0;

$row = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];

    // Câu lệnh SQL Update
    $sql = "UPDATE students SET 
            name='$name', 
            age='$age', 
            email='$email', 
            phone='$phone', 
            address='$address', 
            gender='$gender' 
            WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        header("Location: ../Read/index.php");
        exit();
    } else {
        echo "Lỗi: " . mysqli_error($conn);
    }
}

$sql_get = "SELECT * FROM students WHERE id=$id";
$result = mysqli_query($conn, $sql_get);
$row = mysqli_fetch_assoc($result);

if (!$row) {
    die("Không tìm thấy thông tin sinh viên này! <a href='../Read/index.php'>Quay lại</a>");
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Cập Nhật Thông Tin</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="container">
        <h2>Chỉnh Sửa Thông Tin</h2>
        
        <form method="post">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            
            <label>Họ Tên:</label> 
            <input type="text" name="name" value="<?php echo $row['name']; ?>" required>
            
            <label>Tuổi:</label> 
            <input type="number" name="age" value="<?php echo $row['age']; ?>" required>
            
            <label>Email:</label> 
            <input type="text" name="email" value="<?php echo $row['email']; ?>" required>
            
            <label>SĐT:</label> 
            <input type="text" name="phone" value="<?php echo $row['phone']; ?>" required>
            
            <label>Địa chỉ:</label> 
            <input type="text" name="address" value="<?php echo $row['address']; ?>" required>
            
            <label>Giới tính:</label><br>
            <div style="margin-bottom: 20px;">
                <input type="radio" name="gender" value="Male" <?php if($row['gender']=='Male') echo 'checked'; ?>> Nam
                <input type="radio" name="gender" value="Female" <?php if($row['gender']=='Female') echo 'checked'; ?>> Nữ
            </div>
            
            <input type="submit" class="submit-btn" value="Cập Nhật Ngay">
        </form>
        
        <a href="../Read/index.php" class="btn btn-home">↩ Quay lại danh sách</a>
    </div>
</body>
</html>