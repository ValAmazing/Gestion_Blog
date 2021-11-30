<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('trips.store') }}" method="post">
        @csrf
        
        <label for="name">Nom:</label>
        <input type="text" name="name" id="name">

        <label for="age">Age: </label>
        <input type="number" name="age" id="age">

        <label for="destination">Destination: </label>
        <input type="text" name="destination" id="destination">

        <button type="submit">Valider</button>
    </form>
    @if ($errors->any())
        @foreach($errors->all() as $error)
   <p> {{$error}} </p>
        @endforeach

    @endif
    

</body>
</html>