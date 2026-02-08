<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sinh viên</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="p-10 bg-gray-50">
    <div class="max-w-lg mx-auto bg-white p-6 rounded shadow">
        <h2 class="text-2xl font-bold mb-4">Thêm sinh viên mới</h2>
        
        <form action="{{ route('students.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block mb-1 font-medium">Họ tên</label>
                <input type="text" name="name" class="w-full border rounded p-2" required>
            </div>
            
            <div class="mb-4">
                <label class="block mb-1 font-medium">Email</label>
                <input type="email" name="email" class="w-full border rounded p-2" required>
            </div>

            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded w-full hover:bg-green-600">
                Lưu lại
            </button>
            <a href="{{ route('students.index') }}" class="block text-center mt-3 text-gray-500">Quay lại</a>
        </form>
    </div>
</body>
</html>