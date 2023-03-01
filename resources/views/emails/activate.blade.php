<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <h3>Bonjour {{$user->name}}</h3>
            <p>
                Votre compte a été créé avec succès. Pour l'activer veuillez cliquer sur ce 
                <a href="{{ route('confirmEmail', $user->activate_code) }}" target="__blank">lien</a> 
            </p>
        </div>
    </div>
</body>
</html>