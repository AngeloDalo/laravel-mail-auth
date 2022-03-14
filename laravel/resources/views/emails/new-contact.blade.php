<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Hai ricevuto un nuovo contatto!</h1>
    <p>{{ $lead->name }}</p>
    <p>{{ $lead->email }}</p>
    <p>{{ $lead->message }}</p>
</body>
</html>