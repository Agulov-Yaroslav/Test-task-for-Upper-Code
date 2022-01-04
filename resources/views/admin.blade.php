@extends('layouts.app')

@section('content')
    <div class="container">

        <h1 class="mb-3">Admin panel</h1>


        @foreach($forms as $form)
            <div class="container border">
                <div class="d-flex w-100 justify-content-between mt-2">

                    <h5 class="mb-1">Заявка {{ $form->id }}<br>
                        Тема: {{ $form->title }}</h5>
                    <small> Дата создания: {{ $form->created_at->format('d/m/Y') }}</small>
                </div>
                <p class="mb-1">Сообщение: {{ $form->body }}</p>
                <p class="mb-1"><strong>Имя клиента:</strong> {{ $form->user->name }}</p>
                <p class="mb-1"><strong>Почта клиента:</strong> {{ $form->user->email }}</p>

                @isset($form->file)
                    <p class="mb-1"><strong>Ссылка на прикрепленный файл:</strong>
                    <a href="{{ $form->file }}" class="btn btn-primary">Фото</a></p>
                @endisset

                <form method="post" action="/update/{{ $form->id }}">
                    @csrf
                    <input type="hidden" name="status" id="status"/>
                    @if($form->status == 1)
                        <button class="btn btn-lg btn-success m-2" type="submit">
                            Просмотренно
                        </button>
                    @elseif($form->status == 0)
                        <button class="btn btn-lg btn-danger  m-2" type="submit">
                            Нужно ответить
                        </button>
                    @endif
                </form>
            </div>


        @endforeach


    </div>
@endsection
