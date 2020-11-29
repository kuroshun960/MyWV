@extends('layouts.app')

@section('content')
<div class="container">


    <div class="text-center">
        <h1>ユーザー設定</h1>
    </div>

    <div class="row">
        <div class="col-sm-6 offset-sm-3">

                {!! Form::model($userSetting, ['route' => ['users.update', $userSetting->id], 'enctype' => 'multipart/form-data']) !!}
                <div class="form-group">
                    {!! Form::text('name', old('name'), ['class' => 'form-control','placeholder' => '名前']) !!}
                </div>

                <div class="form-group">
                    {!! Form::email('email', old('email'), ['class' => 'form-control','placeholder' => 'メールアドレス']) !!}
                </div>

                <div class="form-group">
                    {!! Form::password('password', ['class' => 'form-control','placeholder' => 'パスワード']) !!}
                </div>

                <div class="form-group">
                    {!! Form::password('password_confirmation', ['class' => 'form-control','placeholder' => 'パスワード（確認）']) !!}
                </div>

                {!! Form::submit('更新する', ['class' => 'btn btn-primary btn-block']) !!}
            {!! Form::close() !!}
        </div>
    </div>


    
    
</div>
@endsection