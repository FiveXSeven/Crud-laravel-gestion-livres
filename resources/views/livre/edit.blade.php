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
    <main class="container">
        <h2>Modifier le livre "{{$livre->titre}}" </h2>
        <form class="form ajouter" action="{{route('livre.update', ['id' => $livre] )}}" method="post">
            @csrf
            @method('put')
            <div>
                <label class="label" for="">Titre</label>
                <input class="inputBox" type="text" name="titre" value="{{$livre->titre}}">
            </div>
            <div>
                <label class="label" for="">Auteur</label>
                <input class="inputBox" type="text" name="auteur" value="{{$livre->auteur}}">
            </div>
            <div>
                <label class="label" for="">Déscription</label>
                <input class="inputBox" type="text" name="description" value="{{$livre->description}}">
            </div>
            <div>
                <label class="label" for="">Année de publication</label>
                <input class="inputBox" type="number" name="annee" value="{{$livre->annee}}">
            </div>
            <div>
                <input class="btn" type="submit" value="Ajouter">
                <a class="btn" href="{{route('livre.liste')}}">Annuler</a>
            </div>
        </form>
    </main>
</body>
</html>
