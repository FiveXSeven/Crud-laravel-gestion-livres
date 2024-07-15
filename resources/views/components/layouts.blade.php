<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/index.css')}}">
    <link rel="stylesheet" href="{{asset('css/header.css')}}">
    <link rel="stylesheet" href="{{asset('css/form.css')}}">
    <title>Gestion de livres</title>
</head>
<body>
        <header>
            <nav class="navBar">
                <div class="container">
                    <p>BiblioLivre</p>
                    <ul>
                        <li>
                            <a href="{{route('login')}}">Se connecter</a>
                        </li>
                        <li>
                            <a href="{{route('register')}}">Créer un compte</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="container">
                {{$slot}}
            </div>
        </header>
</body>
</html>
