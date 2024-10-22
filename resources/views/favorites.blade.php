<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Favorites</title>
</head>
<body>
    <h1>FAVORITES</h1>
    @foreach ($favorites as $favorite)
        <div>
            <b>{{ $favorite->title }}</b><br>
            <i>{{ $favorite->description }}</i><br>
            {{ $favorite->content }}<br>
            Updated on {{ $favorite->updated_at }}<br>
            Created on {{ $favorite->created_at }}

            <form action="{{ route('notes')}}" method="GET">
                <button type="submit">View All Notes</button>
            </form>
            
            <hr>
        </div>
    @endforeach
</body>
</html>