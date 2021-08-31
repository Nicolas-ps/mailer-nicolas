@component('mail::message')

<h1>{{ $month }} de {{ $year }}</h1>
<p>Disparando e-mails utilizando o cliente SMTP Gmail. Com limite diário de no máximo 100 emails.</p>

@endcomponent