@extends('layouts.master')

@section('stylesheets')
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/8.4/styles/obsidian.min.css">
@endsection

@section('content')
    <article class="post">
        <h3 class="post-title">
            {{ $post->title }}
        </h3>

        <h5 class="muted">
            {{ $post->formatted_date() }}
        </h5>

        {!! $post->content !!}
    </article>
@endsection

@section('scripts')
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/8.4/highlight.min.js"></script>
    <script>hljs.initHighlightingOnLoad();</script>
@endsection