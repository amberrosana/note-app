<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Favorites</title>
</head>
<body>
    <h1>FAVORITES</h1>
    <form action="{{ route('notes') }}" method="GET">
        <button type="submit">View All Notes</button>
    </form>
    <hr>
    @foreach ($favorites as $favorite)
        <div>
            <b>{{ $favorite->title }}</b><br>
            <i>{{ $favorite->description }}</i><br>
            {{ $favorite->content }}<br>
            Updated on {{ $favorite->updated_at }}<br>
            Created on {{ $favorite->created_at }}

            <form action="{{ route('removeFromFavorites', ['id' => $favorite->id]) }}" method="POST">
                @method('PATCH')
                @csrf
                <button type="submit">Remove From Favorites</button>
            </form>

            <form action="{{ route('notes')}}" method="GET">
                <button type="submit">View All Notes</button>
            </form>
            
            <hr>
        </div>
    @endforeach
</body>
</html>