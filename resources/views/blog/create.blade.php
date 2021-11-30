<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('blog.store') }}" method="post">
        @csrf

        <label for="title">Titre</label>
        <input type="text" name="title" id="tilte">

            @if($errors->has('title'))
            {{$errors->first('title')}}
            @endif

        <label for="content">Contenu</label>
        <input type="text" name="content" id="content">

            @if($errors->has('content'))
            {{$errors->first('content')}}
            @endif

        <label for="author">Auteur</label>
        <input type="text" name="author" id="author">

            @if($errors->has('author'))
            {{$errors->first('author')}}
            @endif

        <label for="follow">follow</label>
        <input type="text" name="follow" id="follow">

            @if($errors->has('follow'))
            {{$errors->first('follow')}}
            @endif

        <button type="submit">Envoyer</button>

    </form>

</body>
</html>
