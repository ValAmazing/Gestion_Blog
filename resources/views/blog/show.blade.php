<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Titre: {{$posts->title}}</h1>
    <p>Contenu: {{$posts->content}}</p>
    <p>Auteur: {{$posts->author}}</p>
    <a href="{{route('blog.edit', [$posts->id])}}">Edit</a>
</body>
</html>
