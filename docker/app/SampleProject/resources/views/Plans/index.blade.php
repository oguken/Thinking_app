@extends('layout')

@section('content')
        <h1>アクションプラン</h1>

        <table class='table table-striped table-hover'>
        <tr>
        <th>思考</th><th>アクションプラン</th><th>結果</th>
        </tr>
        @foreach ($plans as $plan)
            <tr>
            <td>{{ $plan->thinking->thinking }}、に対して</td>

                <td>
                    <a href={{ route('plan.detail', ['id' =>  $plan->id]) }}>
                    {{ $plan->plan }}
                    </a>
                </td>
                <td>{{ $plan->result }}</td>
            </tr>
        @endforeach
        </table>

        @auth
            <div>
                <a href={{ route('plan.new', ['thinking_id' => $thinking_id]) }} class='btn btn-outline-primary'>新規プラン</a>
            </div>
        @endauth
@endsection
