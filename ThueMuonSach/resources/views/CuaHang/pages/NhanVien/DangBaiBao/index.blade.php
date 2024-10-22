@extends('CuaHang.layouts.index')

@section('content')
<h1>Nhân viên - Đăng bài báo</h1>
<!-- resources/views/create_article.blade.php -->
    <form class="dangbao-form" method="POST" action="">
        @csrf
        <label class="dangbao-label" for="title">Tiêu Đề:</label>
        <input class="dangbao-input" type="text" id="title" name="title" required>

        <label class="dangbao-label" for="content">Nội Dung:</label>
        <textarea class="dangbao-textarea" id="content" name="content" required></textarea>

        <button class="dangbao-button" type="submit">Đăng</button>
        <button class="dangbao-button dangbao-button-danger" type="button" onclick="clearForm()">Xóa Toàn Bộ Nội Dung</button>
    </form>

    <script>
        function clearForm() {
            document.getElementById('title').value = '';
            document.getElementById('content').value = '';
        }
    </script>
@endsection