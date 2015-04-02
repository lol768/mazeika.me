@extends('emails.layouts.master')

@section('content')
    <p>
        Hey there,
    </p>

    <p>
        Thank you for subscribing to
        <a style="color:#06C;text-decoration:none" href="{{ url('/') }}">mazeika.me</a>.
        You'll be receiving notifications when new posts are written. If you did not
        request to subscribe, you may safely ignore this message. Otherwise, please
        confirm your subscription to begin receiving emails:
    </p>

    <h2>
        <a style="color:#06C;text-decoration:none" href="{{ route('confirm', ['token' => $token]) }}">
            CONFIRM SUBSCRIPTION
        </a>
    </h2>
@endsection
