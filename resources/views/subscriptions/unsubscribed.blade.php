@extends('layouts.master')

@section('content')
    <article class="post">
        <p>
            Unsubscribed! To resubscribe, click
            <a href="{{ route('subscribe', ['email' => $email]) }}">here</a>!
        </p>
    </article>
@endsection