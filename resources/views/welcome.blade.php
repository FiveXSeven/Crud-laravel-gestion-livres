<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Gestion de livres</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="{{asset('css/index.css')}}">
        <link rel="stylesheet" href="{{asset('css/header.css')}}">

    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
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
        </header>

        <main>
            <div class="container">
                <h2>Application de gestion de livres</h2>
                <p>Cette application vous permet d'enregistrer des livres en saisissant le titre, l'auteur et une petite description du livre</p>
                <p>Vous aurez la possibilité d'éditer ses données et de les supprimer seulement si vous avez les droits d'admin</p>

                <div class="linkBtn">
                    <a class="btn" href="{{route('login')}}">Connexion</a>
                    <a class="btn2" href="{{route('register')}}">Nouveau compte</a>
                </div>
            </div>
        </main>
    </body>
</html>
