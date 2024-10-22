<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>View Note</title>
</head>
<body>
    <div>
        <h1>{{ $note->title }}</h1>
        <p>
            <i>{{ $note->description }}</i><br>
            {{ $note->content }}<br><br>
            Updated on {{ $note->updated_at }}<br>
            Created on {{ $note->created_at }}
        </p>
    </div>

    <form action="{{ route('editNote', ['id' => $note->id]) }}" method="GET">
        <button type="submit">Edit Note</button>
    </form>

    <form action="{{ route('deleteNote', ['id' => $note->id]) }}" method="POST"
        onsubmit="return confirm('Are you sure you want to delete this note?')">
        @method('DELETE')
        @csrf 
        <button type="submit">Delete Note</button>
    </form>

    <form action="{{ route('notes') }}" method="GET">
        <button type="submit">View All Notes</button>
    </form>
</body>
</html>