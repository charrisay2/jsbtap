    <?php
session_start(); 

$name = $age = $email = $phone = $address = $gender = "";
$nameErr = $ageErr = $emailErr = $phoneErr = $addressErr = $genderErr = "";

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
            $nameErr = "Only letters and white space allowed";
        }
    }

    if (empty($_POST["age"])) {
        $ageErr = "Age is required";
    } else {
        $age = test_input($_POST["age"]);
        if (!preg_match("/^[0-9]*$/", $age)) {
            $ageErr = "Only number (0-9) allowed";
        } else {
            if ($age >= 100 || $age <= 0) {
                $ageErr = "Invalid your age";
            }
        }
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    if (empty($_POST["phone"])) {
        $phoneErr = "Phone is required";
    } else {
        $phone = test_input($_POST["phone"]);
        if (!preg_match('/^0\d{9}$/', $phone)) {
            $phoneErr = "Only number (0-9) & correct your phone allowed";
        }
    }

    if (empty($_POST["address"])) {
        $addressErr = "Address is required";
    } else {
        $address = test_input($_POST["address"]);
        if (!preg_match("/^[a-zA-Z0-9- ]*$/", $address)) {
            $addressErr = "Only letters and white space allowed";
        }
    }

    if (empty($_POST["gender"])) {
        $genderErr = "Gender is required";
    } else {
        $gender = test_input($_POST["gender"]);
    }

    if (empty($nameErr) && empty($ageErr) && empty($emailErr) && empty($phoneErr) && empty($addressErr) && empty($genderErr)) {
        
        $filename = "data_sinh_vien.txt";
        $content = "$name | $age | $email | $phone | $address | $gender\n";
        
        $file = fopen($filename, "a") or die("Unable to open file!");
        fwrite($file, $content);
        fclose($file);

        $_SESSION['user_info'] = [
            'name' => $name, 'age' => $age, 'email' => $email,
            'phone' => $phone, 'address' => $address, 'gender' => $gender
        ];

        header("Location: welcome.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <style>
    .register {
      display: block;
      justify-self: center;
      border: 1px solid black;
      padding: 10px 20px;
      background-color: greenyellow;
      border-radius: 12px;
      width: 300px;
    }
    .register h2 { margin: 0; font-size: 20px; text-align: center; }
    .register p { margin: 0; font-size: 16px; }
    form { justify-content: center; font-size: 14px; padding-top: 20px; }
    .input-text {
      background-color: whitesmoke;
      display: flex; text-align: left; justify-self: stretch; margin: 0; padding: 2px; width: 100%;
    }
    .input-submit {
      background-color: burlywood; padding: 5px 50px; justify-self: center; display: flex; cursor: pointer;
    }
    .error { color: red; }
  </style>
</head>
<body>
  <div class="register">
    <h2>Đăng kí thông tin sinh viên</h2>
    <p><span class="error">Notice: * is required</span></p>
    <div class="form-register">
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        
        Name: <input class="input-text" type="text" name="name" value="<?php echo $name;?>">
        <span class="error">* <?php echo $nameErr;?></span>
        <br><br>

        Age: <input class="input-text" type="text" name="age" value="<?php echo $age;?>">
        <span class="error">* <?php echo $ageErr;?></span>
        <br><br>

        Email: <input class="input-text" type="text" name="email" value="<?php echo $email;?>">
        <span class="error">* <?php echo $emailErr;?></span>
        <br><br>

        Phone: <input class="input-text" type="text" name="phone" value="<?php echo $phone;?>">
        <span class="error">* <?php echo $phoneErr;?></span>
        <br><br>

        Address: <input class="input-text" type="text" name="address" value="<?php echo $address;?>">
        <span class="error">* <?php echo $addressErr;?></span>
        <br><br>

        Gender:
        <input class="input-radio" type="radio" name="gender" <?php if (isset($gender) && $gender=="Female") echo "checked";?> value="Female">Female
        <input class="input-radio" type="radio" name="gender" <?php if (isset($gender) && $gender=="Male") echo "checked";?> value="Male">Male
        <span class="error">* <?php echo $genderErr;?></span>
        <br><br>

        <input class="input-submit" type="submit" name="submit" value="Submit">
      </form>
    </div>
  </div>
</body>
</html>