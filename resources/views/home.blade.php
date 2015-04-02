@extends('layouts.master')

@section('content')
    @foreach($posts->reverse() as $p)
        <article class="post post-preview">
            <h3 class="post-title">
                <a class="link" href="{{ route('showPost', $p->slug) }}">
                    {{ $p->title }}
                </a>
            </h3>

            <h5 class="muted">
                {{ $p->formatted_date() }}
            </h5>
        </article>
    @endforeach
@endsection