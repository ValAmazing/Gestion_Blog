<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @foreach ($posts as $post)

    <a href="{{route('blog.show', [$post->id])}}"> <h1>Titre:  {{$post->title}} </h1></a>

   <p>Contenu:  {{$post->content}}</p>
   <p>Auteur : {{$post->author}} </p>
   <form action="{{route('blog.destroy', [$post->id])}}" method="post">
    @csrf
    @method('DELETE')
   <button>supprimer</button>
   </form>
    @endforeach
</body>
</html>
