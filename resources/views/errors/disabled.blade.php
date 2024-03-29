<!DOCTYPE html>
<html>
<head>
    <title>Blog désactivé</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <link href="{{ asset('/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>

    <style>
        html, body {
            height: 100%;
        }

        body {
            margin: 0;
            padding: 0;
            width: 100%;
            color: #B0BEC5;
            display: table;
            font-weight: 100;
            font-family: 'Lato';
        }

        .container {
            text-align: center;
            display: table-cell;
            vertical-align: middle;
        }

        .content {
            text-align: center;
            display: inline-block;
        }

        .title {
            font-size: 72px;
            margin-bottom: 40px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="content">
        <div class="title">Ce blog est désactivé.</div>
        <div class="text-left">
            @if($authenticatedUser && $authenticatedUser->username == $username)
                <br><br>
                <h2>Message de l'admin:</h2>
                <h3>{{ $blog->note }}</h3>
            @endif
        </div>
    </div>
</div>
</body>
</html>
