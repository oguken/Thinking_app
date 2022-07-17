@extends('layout')

@section('content')
    <h1>{{ $plan->plan }}、詳細</h1>
    <div>
        <p>{{ $plan->result }}</p>
    </div>

    <div>
        <a href={{ route('plan.list', ['thinking_id' => $plan->thinking->id]) }}>一覧に戻る</a>

        @auth
            @if ($plan->thinking->user_id === $login_user_id)
            | <a href={{ route('plan.edit', ['id' =>  $plan->id, 'thinking_id' => $plan->thinking->id]) }} class="btn btn-success">編集</a>
                <p></p>
                <form method="POST" action='{{ route("plan.destroy",["id" => $plan->id]) }}'>
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('本当に削除しますか？')" class ="btn btn-danger">
                    削除
                    </button>
                </form>
                @endif
        @endauth
    </div>
@endsection
