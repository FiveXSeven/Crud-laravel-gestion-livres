<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/dashboard.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <!-- SweetAlert JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                {{ __('Bibliothèque') }}
                </x-nav-link>
            </li>

            @if (auth()->user()->role === 'admin')
            <li>
                <x-nav-link :href="route('livre.ajouter')" :active="request()->routeIs('livre.ajouter')">
                {{ __('Ajouter') }}
                </x-nav-link>
            </li>
            @endif
        </ul>
        </div>
    </nav>

    <main class="container">
            @if($search->isEmpty())
        <h2>Pas de livre avec ce titre</h2>
    <form action="{{ route('livre.search') }}" method="get">
        <input class="inputBox" type="text" name="search" placeholder="Rechercher un livre...">
        <button class="btn" type="submit">Rechercher</button>
    </form>
    @else
        <div class="card">
        <h2>Résultat de la recherche</h2>
        </div>
        <form action="{{ route('livre.search') }}" method="get">
            <input class="inputBox" type="text" name="search" placeholder="Rechercher un livre...">
            <button class="btn" type="submit">Rechercher</button>
        </form>
        <ul>
            @foreach($search as $search)
            <div class="book-card">
                <h2 class="book-title"> {{$search->titre}} </h2>
                <h3 class="book-author">Auteur: {{$search->auteur}} </h3>
                <p class="book-year">Année de Publication: {{$search->annee}} </p>
                <p class="book-description">
                    {{$search->description}}
            </p>

            @if (auth()->user()->role === 'admin')
            <div class="cardBtn">
                <a class="btnEdit" href="{{route('livre.edit', ['id' => $search] )}}">Modifier</a>
            <form id="deleteForm"  action="{{ route('livre.delete', ['id' => $search]) }}" method="post">
                @csrf
                @method('delete')
                <input class="btnDel" style="cursor: pointer" type="submit" value="Supprimer">
            </form>
            </div>
            @endif
    </div>
            @endforeach
        </ul>
    @endif

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
