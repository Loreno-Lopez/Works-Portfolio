<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Presto.it</title>
</head>

<body>
    <div>
        <h1>Un utente ha chiesto di diventare revisore</h1>
        <h2>Ecco i suoi dati:</h2>
        <p>Nome: {{$user->name}}</p>
        <p>Email: {{$user->email}}</p>
        <p>Vuoi renderlo revisore?</p>
        <a href="{{route('make.revisor', compact('user'))}}">Rendi revisore</a>
    </div>

</body>

</html>