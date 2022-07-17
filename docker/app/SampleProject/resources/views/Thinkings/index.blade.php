@extends('layout')

@section('content')
        <h1>思考</h1>

        <table class='table table-striped table-hover'>
        <tr>
            <th>状況</th><th>思考</th><th>アクションプラン</th><th>投稿者</th>
        </tr>
        @foreach ($thinkings as $thinking)
            <tr>
                <td>{{ $thinking->status->status_name }}</td>
                <td>
                    <a href={{ route('thinking.detail', ['id' =>  $thinking->id]) }}>
                        {{ $thinking->thinking }}
                    </a>

                    <td>
                    <a href={{ route('plan.list', ['thinking_id' => $thinking->id]) }} class="btn btn-success">プラン</a>
                    </td>

                </td>
                <td>{{ $thinking->user->name }}</td>
            </tr>
        @endforeach
        </table>

        @auth
            <div>
            <a href={{ route('thinking.new') }} class='btn btn-outline-primary'>投稿</a>
            <div>
        @endauth
@endsection
