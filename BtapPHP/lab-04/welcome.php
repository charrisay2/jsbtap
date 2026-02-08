<?php
session_start();
// Nếu chưa có dữ liệu thì quay về trang đăng ký
if (!isset($_SESSION['user_info'])) {
    header("Location: index.php");
    exit();
}
$user = $_SESSION['user_info'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <style>
        body { font-family: sans-serif; display: flex; justify-content: center; padding-top: 50px; }
        .container { text-align: center; }
        table, th, td { border: 1px solid black; border-collapse: collapse; padding: 10px; }
        th { background-color: #f2f2f2; }
        .success { color: green; font-weight: bold; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome <?php echo $user['name']; ?></h1>
        <p class="success">Đã lưu thông tin vào file data_sinh_vien.txt thành công!</p>
        <p>Chúng tôi luôn chào đón bạn!!! Newbie</p>
        
        <table align="center">
            <tr><th>Name</th><td><?php echo $user['name']; ?></td></tr>
            <tr><th>Age</th><td><?php echo $user['age']; ?></td></tr>
            <tr><th>Email</th><td><?php echo $user['email']; ?></td></tr>
            <tr><th>Phone</th><td><?php echo $user['phone']; ?></td></tr>
            <tr><th>Address</th><td><?php echo $user['address']; ?></td></tr>
            <tr><th>Gender</th><td><?php echo $user['gender']; ?></td></tr>
        </table>
        
        <br>
        <a href="index.php">Quay lại đăng ký</a>
    </div>
</body>
</html>