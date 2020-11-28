@extends('layouts.app')

@section('content')


{{-- {!! Form::open(['route' => 'tag.post', 'enctype' => 'multipart/form-data']) !!}  --}}

    <div class="tagaddList">
    @foreach ($artistTags as $artistTag)
        <span>　{{ $artistTag->name }}　/</span>
    @endforeach
    </div>

{!! Form::model($artistId, ['route' => ['tag.post', $artistId->id], 'enctype' => 'multipart/form-data']) !!}

    <div class="form-group">
        @csrf
        
        {!! Form::label('name', 'タグ:') !!}
        {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
        <br>

        {!! Form::submit('登録', ['class' => 'btn btn-primary btn-block']) !!}
        
    </div>
{!! Form::close() !!}





@endsection