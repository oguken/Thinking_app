@extends('layout')

@section('content')
    <h1>{{$plan->plan}}、を編集する</h1>
    {{ Form::model($plan, ['route' => ['plan.update', $plan->id]]) }}
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
            {{ Form::submit('更新する', ['class' => 'btn btn-outline-primary']) }}
        </div>
    {{ Form::close() }}

    <div>
        <a href={{ route('plan.list', ['thinking_id' => $thinking_id]) }}>一覧に戻る</a>
    </div>

@endsection
