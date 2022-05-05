@extends('login_template')
@section('title', 'Authentification')
@section('container')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    <form action="{{ route('page.login.check') }}" method="POST" autocomplete="off">
        <h1>NAMBININTSOA</h1>
        @csrf
        <div class="inset">
            <p>
                <label for="identifiant">Identifiant</label>
                <input type="text" name="identifiant" id="identifiant">
            </p>
            <p>
                <label for="password">Mot de Passe</label>
                <input type="password" name="password" id="password">
            </p>
        </div>
        <p class="p-container">
            <span>Mot de Passe oublier ?</span>
            <input type="submit" name="go" id="go" value="Se connecter">
        </p>
    </form>
</body>

</html>
@endsection
