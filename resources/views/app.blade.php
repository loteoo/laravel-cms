<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Laravel</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

  <!-- Styles -->
  <style>
    html, body {
    background-color: #fff;
    color: #636b6f;
    font-family: 'Nunito', sans-serif;
    font-weight: 200;
    height: 100vh;
    margin: 0;
    }

    aside {
        width: 33%;
    }
    main {
        width: 66%;
    }

  </style>
  </head>
  <body>
  <header>
      Header

    @if (Route::has('login'))
    <div class="top-right links">
      @auth
      <a href="{{ url('/home') }}">Home</a>
      @else
      <a href="{{ route('login') }}">Login</a>

      @if (Route::has('register'))
        <a href="{{ route('register') }}">Register</a>
      @endif
      @endauth
    </div>
    @endif

    </header>



    <div style="display: flex; justify-content: space-between; padding: 3rem;">
        <aside>
            <nav>
            @forelse ($resources as $resource)
                <li>
                    <a href="/admin/{{$resource::getCollectionName()}}">{{ $resource::getClassName() }}</a>
                </li>
            @empty
                <p>No resources</p>
            @endforelse
            </nav>
        </aside>
        <main>
            @yield('content')
        </main>

    </div>
  </body>
</html>
