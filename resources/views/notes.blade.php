<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Note App</title>
</head>
<body>
    <h1>Notes</h1>
    <form action="{{ route('createNote')}}" method="GET">
        <button type="submit">New Note</button>
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
            <hr>
        </div>
    @endforeach
</body>
</html>