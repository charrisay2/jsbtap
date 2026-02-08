<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Trang Chủ - Quản Lý Sinh Viên</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <div class="main-wrapper">
        <h1 style="text-align: center; color: #4CAF50; margin-bottom: 40px;">HỆ THỐNG QUẢN LÝ SINH VIÊN</h1>
        
        <div class="menu-box">
            <a href="Read/index.php" class="menu-item item-read">
                <div class="icon"><i class="fas fa-list"></i></div>
                <div class="title">Xem Danh Sách</div>
                <div class="desc">(Read)</div>
            </a>

            <a href="Create/index.php" class="menu-item item-create">
                <div class="icon"><i class="fas fa-user-plus"></i></div>
                <div class="title">Thêm Mới</div>
                <div class="desc">(Create)</div>
            </a>

            <a href="Read/index.php" class="menu-item item-update">
                <div class="icon"><i class="fas fa-user-edit"></i></div>
                <div class="title">Cập Nhật</div>
                <div class="desc">(Update)</div>
            </a>

            <a href="Read/index.php" class="menu-item item-delete">
                <div class="icon"><i class="fas fa-user-times"></i></div>
                <div class="title">Xóa Sinh Viên</div>
                <div class="desc">(Delete)</div>
            </a>
        </div>

        <p style="text-align: center; margin-top: 30px; color: #666;">
            * Chọn chức năng Cập Nhật hoặc Xóa sẽ chuyển đến danh sách để chọn đối tượng cụ thể.
        </p>
    </div>
</body>
</html>