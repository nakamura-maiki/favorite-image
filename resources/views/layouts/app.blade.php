<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>favorite-image</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
        <link href="{{asset('/assets/css/app.css')}}" rel="stylesheet">
    </head>

    <body>

        {{-- ナビゲーションバー --}}
        @include('commons.navbar')

        <div class="container-fluid">
            {{-- エラーメッセージ --}}
            @include('commons.error_messages')

            @yield('content')
        </div>
        
        <!--フッター下に表示-->
        <nav class="navbar navbar-expand-sm fixed-bottom navbar-dark p-0 justify-content-center" style="background-color:#FF9999;">
          <a class="navbar-brand" href="#">
            オリジナルアプリ　広告
          </a>
        </nav>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>
    </body>
</html>