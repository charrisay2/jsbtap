<?php
session_start(); // Khởi tạo session để truyền dữ liệu sang trang sau

// 1. Khởi tạo biến
$name = $age = $email = $phone = $address = $gender = "";
$errors = [
    'name' => '', 'age' => '', 'email' => '', 'phone' => '', 'address' => '', 'gender' => ''
];

// 2. Hàm làm sạch dữ liệu
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// 3. Xử lý khi người dùng bấm Submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Validate Name
    if (empty($_POST["name"])) {
        $errors['name'] = "Tên là bắt buộc";
    } else {
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) $errors['name'] = "Chỉ chấp nhận chữ cái và khoảng trắng";
    }

    // Validate Age
    if (empty($_POST["age"])) {
        $errors['age'] = "Tuổi là bắt buộc";
    } else {
        $age = test_input($_POST["age"]);
        if (!is_numeric($age) || $age <= 0 || $age >= 100) $errors['age'] = "Tuổi không hợp lệ (1-99)";
    }

    // Validate Email
    if (empty($_POST["email"])) {
        $errors['email'] = "Email là bắt buộc";
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors['email'] = "Định dạng email sai";
    }

    // Validate Phone
    if (empty($_POST["phone"])) {
        $errors['phone'] = "SĐT là bắt buộc";
    } else {
        $phone = test_input($_POST["phone"]);
        if (!preg_match('/^0\d{9}$/', $phone)) $errors['phone'] = "SĐT phải bắt đầu bằng 0 và có 10 số";
    }

    // Validate Address
    if (empty($_POST["address"])) {
        $errors['address'] = "Địa chỉ là bắt buộc";
    } else {
        $address = test_input($_POST["address"]);
    }

    // Validate Gender
    if (empty($_POST["gender"])) {
        $errors['gender'] = "Vui lòng chọn giới tính";
    } else {
        $gender = test_input($_POST["gender"]);
    }

    // 4. Kiểm tra thành công (Mảng lỗi rỗng)
    if (!array_filter($errors)) {
        // Lưu dữ liệu vào Session
        $_SESSION['info'] = [
            'name' => $name,
            'age' => $age,
            'email' => $email,
            'phone' => $phone,
            'address' => $address,
            'gender' => $gender
        ];

        // Chuyển hướng sang trang Welcome
        header("Location: welcome.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Đăng Ký</title>
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
        .register-card {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            width: 350px;
        }
        h2 { text-align: center; color: #333; margin-top: 0; }
        .note { font-size: 13px; color: #666; text-align: center; margin-bottom: 20px; }
        
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: 600; font-size: 14px; }
        
        .input-text {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box; /* Quan trọng để không vỡ khung */
        }
        .input-text:focus { border-color: #4a90e2; outline: none; }
        
        .error { color: #e74c3c; font-size: 12px; margin-top: 3px; display: block; }
        
        .btn-submit {
            width: 100%;
            padding: 12px;
            background-color: #4a90e2;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
        }
        .btn-submit:hover { background-color: #357abd; }
        
        .radio-group { display: flex; gap: 15px; }
        .radio-group label { font-weight: normal; cursor: pointer; }
    </style>
</head>
<body>

<div class="register-card">
    <h2>Đăng Ký Sinh Viên</h2>
    <p class="note">Vui lòng điền đầy đủ thông tin (*)</p>
    
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        
        <div class="form-group">
            <label>Họ tên:</label>
            <input class="input-text" type="text" name="name" value="<?php echo $name;?>">
            <span class="error"><?php echo $errors['name'];?></span>
        </div>

        <div class="form-group">
            <label>Tuổi:</label>
            <input class="input-text" type="text" name="age" value="<?php echo $age;?>">
            <span class="error"><?php echo $errors['age'];?></span>
        </div>

        <div class="form-group">
            <label>Email:</label>
            <input class="input-text" type="text" name="email" value="<?php echo $email;?>">
            <span class="error"><?php echo $errors['email'];?></span>
        </div>

        <div class="form-group">
            <label>SĐT:</label>
            <input class="input-text" type="text" name="phone" value="<?php echo $phone;?>">
            <span class="error"><?php echo $errors['phone'];?></span>
        </div>

        <div class="form-group">
            <label>Địa chỉ:</label>
            <input class="input-text" type="text" name="address" value="<?php echo $address;?>">
            <span class="error"><?php echo $errors['address'];?></span>
        </div>

        <div class="form-group">
            <label>Giới tính:</label>
            <div class="radio-group">
                <label><input type="radio" name="gender" value="Female" <?php if ($gender=="Female") echo "checked";?>> Nữ</label>
                <label><input type="radio" name="gender" value="Male" <?php if ($gender=="Male") echo "checked";?>> Nam</label>
            </div>
            <span class="error"><?php echo $errors['gender'];?></span>
        </div>

        <button type="submit" class="btn-submit">Gửi thông tin</button>
    </form>
</div>

</body>
</html>