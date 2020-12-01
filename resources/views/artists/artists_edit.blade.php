@extends('layouts.app')

@section('content')
<div class="container">


    <div class="text-center">
        <h1>アーティスト設定</h1>
    </div>

    <div class="row">
        <div class="col-sm-6 offset-sm-3">

            {!! Form::model($artistEdit, ['route' => ['artist.update', $artistEdit->id], 'enctype' => 'multipart/form-data','method' => 'put']) !!}
            
                    {!! Form::label('name', 'アーティスト名:') !!}
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
                        
                {!! Form::submit('更新する', ['class' => 'btn btn-primary btn-block']) !!}
            {!! Form::close() !!}
            
        <div class="artistDeleteBtn">{!! link_to_route('artist.destroy', 'アーティストを削除する', ['id' => $artistEdit->id], ['class' => '']) !!}</div>
            
        </div>
    </div>


    
    
</div>
@endsection