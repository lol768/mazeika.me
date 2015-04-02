@extends('layouts.master')

@section('content')
    <article class="post">
        <p>
            Subscribed! We've sent a confirmation email to
            <a class="link" href="mailto:{{ $email }}">{{ $email }}</a>.
        </p>
    </article>
@endsection