@extends('layouts.master')

@section('content')
    <article class="post">
        <p>
            Great, your post has been created and your subscribers have been
            notified. View it
            <a class="link" href="{{ route('showPost', $post->slug) }}">here</a>!
        </p>
    </article>
@endsection