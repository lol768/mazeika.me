@extends('layouts.master')

@section('content')
    {!! Form::open(['class' => 'admin-form', 'url' => route('newPost')]) !!}
        <label class="admin-form-item admin-form-label" for="admin-title">Title</label>
        <input id="admin-title" class="admin-form-item admin-form-text" name="title" maxlength="255" required/>
        <label class="admin-form-item admin-form-label" for="admin-content">Content</label>
        <textarea id="admin-content" class="admin-form-item admin-form-text" name="content" maxlength="16777215" required></textarea>
        <input class="admin-form-item admin-form-button" type="submit" value="Post"/>
    {!! Form::close() !!}
@endsection