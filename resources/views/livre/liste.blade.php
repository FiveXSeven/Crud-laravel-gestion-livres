<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/dashboard.css')}}">
    <link rel="stylesheet" href="{{asset('css/form.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <!-- SweetAlert JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Gestion de livres</title>
</head>
<body>
    {{-- BARRE DE NAVIGATION
    BARRE DE NAVIGATION
    BARRE DE NAVIGATION --}}
    <nav>
        <div class="container">
            <ul>
            <li>
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Accueil') }}
                </x-nav-link>
            </li>

            @if (auth()->user()->role === 'admin')
            <li>
                <x-nav-link :href="route('livre.ajouter')" :active="request()->routeIs('livre.ajouter')">
                {{ __('Ajouter') }}
                </x-nav-link>
            </li>
            @endif

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

    {{-- DISPLAY BOOK
    DISPLAY BOOK
    DISPLAY BOOK --}}

    <main class="container">
    <h2>Liste des livres</h2>

        {{-- SEARCH BARR
        SEARCH BARR
        SEARCH BARR --}}

    <form action="{{ route('livre.search') }}" method="get">
        <input class="inputBox" type="text" name="search" placeholder="Rechercher un livre...">
        <button class="btn" type="submit">Rechercher</button>
    </form>
        <div class="card">
            @foreach ($livres as $livre)

            <div class="book-card">
                <h2 class="book-title"> {{$livre->titre}} </h2>
                <h3 class="book-author">Auteur: {{$livre->auteur}} </h3>
                <p class="book-year">Année de Publication: {{$livre->annee}} </p>
                <p class="book-description">
                    Déscription:
                    {{$livre->description}}
            </p>

            @if (auth()->user()->role === 'admin')
            <div class="cardBtn">
                <a class="btnEdit" href="{{route('livre.edit', ['id' => $livre] )}}">Modifier</a>
            <form id="deleteForm"  action="{{ route('livre.delete', ['id' => $livre]) }}" method="post">
                @csrf
                @method('delete')
                <input class="btnDel" style="cursor: pointer" type="submit" value="Supprimer">
            </form>
            </div>
            @endif
    </div>
            @endforeach
        </div>
    </main>

<script>
document.getElementById('deleteForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent the default form submission

    Swal.fire({
        title: 'Êtes-vous sûr ?',
        text: "Vous ne pourrez pas revenir en arrière !",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d10606',
        cancelButtonColor:  '#9e2f2',
        confirmButtonText: 'Oui, supprimer !',
        cancelButtonText: 'Annuler'
    }).then((result) => {
        if (result.isConfirmed) {
            this.submit(); // Submit the form if the user confirms
        }
    });
});
</script>
</body>
</html>

