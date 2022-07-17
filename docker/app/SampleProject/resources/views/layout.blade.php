<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
        <meta name='csrf-token' content='{{ csrf_token() }}'>
        <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' >
        <title>Thinking app</title>
        <style>body {padding-top: 130px;}</style>
        <script src='{{ asset("js/app.js") }}' defer></script>
    </head>
    <body>
        <nav class='navbar navbar-expand-md navbar-dark bg-info fixed-top'>
            <a class='navbar-brand col-md-8' href={{route('thinking.list')}}><b>Thinking</b></a>



            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">{{ Auth::user()->name }} |</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">ログイン</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">新規ユーザー登録  |</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                    <!-- 管理者ログインに遷移するリンクの記述、ログイン後はAdmin dashboardと表示 -->
                    @auth('admin')
                    <a href ="{{ route('admin.dashboard')}}">| {{ Auth::guard('admin')->user()->name }}</a>
                    @else
                    <a href ="{{ route('admin.login')}}">| 管理者ログイン</a>
                    @endauth
            </div>


            <!-- <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif


                    @auth('admin')
                    <a href ="{{ route('admin.dashboard')}}">Admin dashboard</a>
                    @else
                    <a href ="{{ route('admin.login')}}">Admin login</a>
                    @endauth

                    @endauth
                </div>
            @endif
        </div> -->


        </nav>
        <div class='container'>
            @yield('content')
        </div>
    </body>
</html>
