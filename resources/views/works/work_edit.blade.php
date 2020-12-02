@extends('layouts.app')

@section('content')
<div class="container">


   

    <div class="text-center">
        <h1>作品の編集</h1>
    </div>

    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            
            <div>
            {!! Form::model($workEdit, ['route' => ['work.update', $workEdit->id], 'enctype' => 'multipart/form-data','method' => 'put']) !!}
            
                    {!! Form::label('title', '作品名:') !!}
                    {!! Form::text('title', old('title'), ['class' => 'form-control']) !!}
                    <br>
                    {!! Form::label('description', '説明:') !!}
                    {!! Form::text('description', old('description'), ['class' => 'form-control']) !!}
                    <br>

                    {!! Form::label('file', '画像ファイル:') !!}
                    {!! Form::file('file', ['class' => 'form-control']) !!}
                    <br>
                        
                {!! Form::submit('更新する', ['class' => 'btn btn-primary btn-block']) !!}
            {!! Form::close() !!}
            </div>
            
            <div>
            
            @if(Auth::id() === $workEdit->work_artist_userid())

            {!! Form::model($workEdit, ['route' => ['artist.destroy', $workEdit->id], 'method' => 'delete']) !!}
                {!! Form::submit('作品を削除', ['class' => 'btn btn-danger','onclick' => 'delete_alert(event);return false;']) !!}
            {!! Form::close() !!} 
            
            @endif

        
            </div>
        
        </div>
    </div>

    
</div>
@endsection