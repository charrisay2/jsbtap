<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết sinh viên</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="p-10">
    <div class="max-w-lg mx-auto border p-6 rounded shadow-lg">
        <h1 class="text-3xl font-bold mb-4">Chi tiết hồ sơ</h1>
        
        <p class="text-lg"><strong>ID:</strong> 1</p>
        <p class="text-lg"><strong>Họ tên:</strong> Nguyễn Văn A</p>
        <p class="text-lg"><strong>Email:</strong> a@example.com</p>

        <div class="mt-6">
            <a href="{{ route('students.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Quay lại danh sách</a>
        </div>
    </div>
</body>
</html>