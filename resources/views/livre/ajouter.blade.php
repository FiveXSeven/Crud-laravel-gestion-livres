<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/dashboard.css')}}">
    <link rel="stylesheet" href="{{asset('css/form.css')}}">
    <title>Gestion de livres</title>
</head>
<body>
    <nav>
        <div class="container">
            <ul>
            <li>
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Accueil') }}
                </x-nav-link>
            </li>
            <li>
                <x-nav-link :href="route('livre.liste')" :active="request()->routeIs('livre.liste')">
                {{ __('Bibliothàque') }}
                </x-nav-link>
            </li>
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-dropdown-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Se Déconnecter') }}
                    </x-dropdown-link>
                </form>
            </li>
        </ul>
        </div>
    </nav>

    <main class="container">
        <h2>Enregistrer un livre</h2>
        <form class="form ajouter" action="{{route('livre.store')}}" method="post">
            @csrf
            @method('post')
            <div>
                <label class="label" for="">Titre</label>
                <input class="inputBox" type="text" name="titre">
            </div>
            <div>
                <label class="label" for="">Auteur</label>
                <input class="inputBox" type="text" name="auteur">
            </div>
            <div>
                <label class="label" for="">Déscription</label>
                <input class="inputBox" type="text" name="description">
            </div>
            <div>
                <label class="label" for="">Année de publication</label>
                <input class="inputBox" type="number" name="annee">
            </div>
            <div>
                <input class="btn" type="submit" value="Ajouter">
            </div>
        </form>
    </main>


</body>
</html>

