@extends('layout')

@section('content')
    <h1>ここからのプラン</h1>
    {{ Form::open(['route' => 'plan.store']) }}
        <div class='form-group'>
            {{ Form::label('plan', 'アクションプラン:',['class' => 'col-sm-2 col-form-label']) }}
            {{ Form::text('plan', null,['class'=>'form-control'. ($errors->has('plan') ? ' is-invalid' : ''),'required']) }}
            <!-- バリデーションの記述 -->
            @error('plan')
            <span class "invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class='form-group'>
            {{ Form::label('result', '結果:',['class' => 'col-sm-2 col-form-label']) }}
            {{ Form::text('result', null,['class'=>'form-control'. ($errors->has('result') ? ' is-invalid' : ''),'required']) }}
            <!-- バリデーションの記述 -->
            @error('result')
            <span class "invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            {{ Form::hidden('thinking_id', $thinking_id) }}
            {{ Form::submit('プランを投稿する', ['class' => 'btn btn-outline-primary']) }}
        </div>
    {{ Form::close() }}

    <div>
        <a href={{ route('plan.list', ['thinking_id' => $thinking_id]) }}>プラン一覧に戻る</a>
    </div>
@endsection
