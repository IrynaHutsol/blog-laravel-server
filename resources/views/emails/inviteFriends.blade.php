@component('mail::message')
# Запрошення

<p>Вас запрошує {{$user}} (email: {{$email}}) приєднатися до Блог-платформи Perseverance.</p>

@component('mail::button', ['url' => config('app.url')])
Перейти на сайт
@endcomponent

Дякую,<br>
{{ config('app.name') }}
@endcomponent