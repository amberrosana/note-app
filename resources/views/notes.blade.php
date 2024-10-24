<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Note App</title>
</head>
<body>
    <h1>Notes</h1>
    <form action="{{ route('createNote') }}" method="GET">
        <button type="submit">New Note</button>
    </form>

    <form action="{{ route('notes') }}" method="GET">
        <div>
            <input type="search" name="search" id="search" class="form control" placeholder="Search" value="{{ $search }}">
        </div>
        <button>Search</button>
        <a href="{{ url('/notes') }}">Reset</a>
    </form>

    <hr>

    @foreach ($notes as $note)
        <div>
            <b>{{ $note->title }}</b><br>
            <i>{{ $note->description }}</i><br>
            {{ $note->content }}<br>
            Updated on {{ $note->updated_at }}<br>
            Created on {{ $note->created_at }}
            <form action="{{ route('viewNote', ['id' => $note->id])}}" method="GET">
                <button type="submit">View Note</button>
            </form>

            <form action="{{ route('addToFavorites', ['id' => $note->id]) }}" method="POST">
                @method('PATCH')
                @csrf
                <button type="submit">Add To Favorites</button>
            </form>

            <form action="{{ route('deleteNote', ['id' => $note->id]) }}" method="POST"
                onsubmit="return confirm('Are you sure you want to delete this note?')">
                @method('DELETE')
                @csrf 
                <button type="submit">Delete Note</button>
            </form>

            <hr>
        </div>
    @endforeach
</body>
</html>