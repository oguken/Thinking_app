@extends('layout')

@section('content')
    <h1>{{$thinking->thinking}}、を編集する</h1>
    {{ Form::model($thinking, ['route' => ['thinking.update', $thinking->id]]) }}
        <div class='form-group'>
            {{ Form::label('thinking', '思考:', ['class' => 'col-sm-2 col-form-label']) }}
            {{ Form::text('thinking', null,['class'=>'form-control'. ($errors->has('thinking') ? ' is-invalid' : ''),'required']) }}
            <!-- バリデーションの記述 -->
            @error('thinking')
            <span class "invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

        </div>

        <div class='form-group'>
            {{ Form::label('status_id', 'ステータス:') }}
            {{ Form::select('status_id', $statuses) }}
        </div>
        <div class="form-group">
            {{ Form::submit('更新する', ['class' => 'btn btn-outline-primary']) }}
        </div>
    {{ Form::close() }}

    <div>
        <a href={{ route('thinking.list') }}>一覧に戻る</a>
    </div>

@endsection
