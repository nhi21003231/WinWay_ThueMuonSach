@extends('CuaHang.layouts.index')

@section('content')
<h1>Nhân viên - Đăng bài báo</h1>
<!-- resources/views/create_article.blade.php -->
 
<body>

<form method="POST" action="">

@csrf

<label for="title">Tiêu Đề:</label>

<input type="text" id="title" name="title" required>
    <label for="content">Nội Dung:</label>
    <textarea id="content" name="content" required></textarea>

    <button type="submit">Đăng</button>
    <button type="button" onclick="clearForm()">Xóa Toàn Bộ Nội Dung</button>
</form>

<script>
    function clearForm() {
        document.getElementById('title').value = '';
        document.getElementById('content').value = '';
    }
</script>
</body>

</html>

@endsection