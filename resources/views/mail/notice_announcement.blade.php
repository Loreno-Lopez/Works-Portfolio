<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Presto.it</title>
</head>

<body>
    <div>
        <h1>Un Annuncio è in fase di revisione</h1>
        <h2>Ecco i dati utente:</h2>
        <p>Nome: {{$user->name}}</p>
        <p>Email: {{$user->email}}</p>
        <p>Annuncio in fase di revisione:</p>
        <a href="{{route('announcements.show', $announcement)}}">annuncio da revisionare</a>
    </div>

</body>

</html>