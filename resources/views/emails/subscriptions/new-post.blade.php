@extends('emails.layouts.master')

@section('content')
    <p>
        A new post has been written at
        <a style="color:#06C;text-decoration:none" href="{{ url('/') }}">mazeika.me</a>:
    </p>

    <h2>
        <a style="color:#06C;text-decoration:none" href="{{ route('showPost', $post->slug) }}">
            {{ $post->title }}
        </a>
    </h2>
@endsection
