<!DOCTYPE html>
<html>
<head>
    <title>Laravel Mail</title>
</head>
<body>
    <h1>Asunto: {{ $data['title'] }}</h1>
    <p>De: {{ $data['from'] }}</p>
    <p>Contenido: {{ $data['body'] }}</p>
    <p>Muchas Gracias</p>
</body>
</html>