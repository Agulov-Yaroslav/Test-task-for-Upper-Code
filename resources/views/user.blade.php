@extends('layouts.app')

@section('content')
<div class="container">
    <div class="container mt-5">
        <form class="mb-3" action="/main" method="post" enctype="multipart/form-data">
            <h2>Форма для обратной связи</h2>
            @csrf
            <div class="form-group">
                <label for="title">Тема</label>
                <input type="text" class="form-control" name="title" id="title">
            </div>
            <div class="form-group">
                <label for="body">Сообщение</label>
                <textarea class="form-control" name="body" id="body" rows="4"></textarea>
            </div>
            <div class="form-group mt-3">
                <label for="file">Файловый импут</label>
                <input type="file" class="form-control-file" name="file" id="file">
            </div>

            <button type="submit" class="btn btn-primary mt-3">Подтвердить</button>
        </form>

    </div>
</div>
@endsection
