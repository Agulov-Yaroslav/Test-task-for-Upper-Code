@foreach($forms as $form)
Заявка {{ $form->id }}
Тема: {{ $form->title }}
Дата создания: {{ $form->created_at->format('d/m/Y') }}
Сообщение: {{ $form->body }}
Имя клиента: {{ $form->user->name }}
Почта клиента: {{ $form->user->email }}
@isset($form->file)
    Ссылка на прикрепленный файл:
        {{ $form->file }}
@endisset
@endforeach

