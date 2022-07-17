@extends('layout')

@section('content')
    <h1>{{ $thinking->thinking }}、詳細</h1>
    <div>
        <p>{{ $thinking->status->status_name }}</p>
    </div>

    <div>
        <a href={{ route('thinking.list') }}>一覧に戻る</a>
        @auth
            @if ($thinking->user_id === $login_user_id)
                | <a href={{ route('thinking.edit', ['id' =>  $thinking->id]) }} class="btn btn-warning">編集</a>
                <p></p>
                <form method="POST" action='{{ route("thinking.destroy",["id" => $thinking->id]) }}'>
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
