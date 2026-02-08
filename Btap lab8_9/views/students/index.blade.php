<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sinh viên</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="p-10">
    <div class="max-w-5xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold">Danh sách sinh viên</h1>
            <a href="{{ route('students.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                + Thêm mới
            </a>
        </div>

        <table class="w-full border-collapse border border-gray-200">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border p-2">ID</th>
                    <th class="border p-2">Tên</th>
                    <th class="border p-2">Email</th>
                    <th class="border p-2">Hành động</th>
                </tr>
            </thead>
            <tbody>
                {{-- @foreach($students as $student) --}}
                <tr>
                    <td class="border p-2 text-center">1</td>
                    <td class="border p-2">Nguyễn Văn A</td>
                    <td class="border p-2">a@example.com</td>
                    <td class="border p-2 text-center space-x-2">
                        <a href="#" class="text-blue-500 hover:underline">Xem</a>
                        <a href="#" class="text-yellow-500 hover:underline">Sửa</a>
                        <button class="text-red-500 hover:underline">Xóa</button>
                    </td>
                </tr>
                {{-- @endforeach --}}
            </tbody>
        </table>
    </div>
</body>
</html>