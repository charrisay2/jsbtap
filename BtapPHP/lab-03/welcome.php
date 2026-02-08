<?php
session_start(); 
if (!isset($_SESSION['info'])) {
    header("Location: index.php");
    exit();
}

$info = $_SESSION['info'];
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Newbie</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }
        .welcome-card {
            background: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            text-align: center;
            max-width: 600px;
            width: 90%;
        }
        h1 { color: #4a90e2; margin-bottom: 5px; }
        p { color: #666; margin-bottom: 25px; }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            text-align: left;
        }
        th, td {
            padding: 12px 15px;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f8f9fa;
            color: #333;
            width: 35%;
        }
        .btn-back {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #6c757d;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: 0.3s;
        }
        .btn-back:hover { background-color: #5a6268; }
    </style>
</head>
<body>

    <div class="welcome-card">
        <h1>Chào mừng, <?php echo $info['name']; ?>! 🎉</h1>
        <p>Hồ sơ sinh viên của bạn đã được ghi nhận.</p>

        <table>
            <tr>
                <th>Họ và Tên</th>
                <td><?php echo $info['name']; ?></td>
            </tr>
            <tr>
                <th>Tuổi</th>
                <td><?php echo $info['age']; ?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><?php echo $info['email']; ?></td>
            </tr>
            <tr>
                <th>Số điện thoại</th>
                <td><?php echo $info['phone']; ?></td>
            </tr>
            <tr>
                <th>Địa chỉ</th>
                <td><?php echo $info['address']; ?></td>
            </tr>
            <tr>
                <th>Giới tính</th>
                <td><?php echo $info['gender']; ?></td>
            </tr>
        </table>

        <a href="index.php" class="btn-back">Đăng ký mới</a>
    </div>

</body>
</html>