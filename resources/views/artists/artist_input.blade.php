@extends('layouts.app')

@section('content')

<!-- 
<form action="/upload/artist" method="POST" enctype="multipart/form-data">
    @csrf

    <label for="photo">画像ファイル:</label>
    <input type="file" class="form-control" name="file">
    <br>
    <input type="submit">
</form>
-->

{!! Form::open(['route' => 'artist.post', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
        @csrf
        
        {!! Form::label('name', '名前:') !!}
        {!! Form::text('name', old('content'), ['class' => 'form-control']) !!}
        <br>
        {!! Form::label('description', '説明:') !!}
        {!! Form::text('description', old('description'), ['class' => 'form-control']) !!}
        <br>
        {!! Form::label('style', 'スタイル:') !!}
        {!! Form::text('style', old('style'), ['class' => 'form-control']) !!}
        <br>
        {!! Form::label('officialHp', '公式サイト:') !!}
        {!! Form::text('officialHp', old('officialHp'), ['class' => 'form-control']) !!}
        <br>
        {!! Form::label('twitter', 'Twitter:') !!}
        {!! Form::text('twitter', old('twitter'), ['class' => 'form-control']) !!}
        <br>
        {!! Form::label('insta', 'Instagram:') !!}
        {!! Form::text('insta', old('insta'), ['class' => 'form-control']) !!}
        <br>
        {!! Form::label('file', '画像ファイル:') !!}
        {!! Form::file('file', ['class' => 'form-control']) !!}
        <br>
        {!! Form::submit('アーティストを登録', ['class' => 'btn btn-primary btn-block']) !!}
        
    </div>
{!! Form::close() !!}





@endsection