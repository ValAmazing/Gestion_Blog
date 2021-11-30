<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1> EDITION DE VOTRE POST </h1>
    @if(session()->has('success'))
    {{session()->get('success')}}
@endif
    @if(session()->has('error'))
    {{session()->get('error')}}
    @endif
    <form action="{{ route('blog.update',[$post->id]) }}" method="post">
        @csrf
        @method('PUT')
        <label for="title">Titre</label>
        <input type="text" name="title" id="tilte" value="{{$post->title}}">

            @if($errors->has('title') )
            {{$errors->first('title')}}
            @endif

        <label for="content">Contenu</label>
        <input type="text" name="content" id="content" value="{{$post->content}}">
            @if($errors->has('content'))
            {{$errors->first('content')}}
            @endif

        <label for="author">Auteur</label>
        <input type="text" name="author" id="author" value="{{$post->author}}">
            @if($errors->has('author'))
            {{$errors->first('author')}}
            @endif

        <label for="follow">follow</label>
        <input type="text" name="follow" id="follow" value="{{$post->follow}}">
            @if($errors->has('follow'))
            {{$errors->first('follow')}}
            @endif

        <button type="submit">Envoyer</button>

    </form>

</body>
</html>
