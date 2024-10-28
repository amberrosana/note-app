<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>EDIT NOTE</title>
</head>
<body>
    <h1>EDIT NOTE</h1>
    <form action="{{ route('updateNote', ['id' => $note->id]) }}" method="POST">
        @method("PUT")
        @csrf
        <label for="title">Title: </label>
        <input type="text" id="title" name="title" value="{{ $note->title }}" maxlength="100"><br>
        <label for="description">Description </label>
        <input type="text" id="description" name="description" value="{{ $note->description }}" maxlength="255"><br>
        <label for="content"></label>
        <textarea type="text" id="content" name="content" maxlength="10000" value="{{ $note->content }}" required></textarea><br>
        <button type="submit">Update Note</button><br>
    </form>

    <form action="{{ route('notes') }}" method="GET">
        <button type="submit">View All Notes</button>
    </form>
</body>
</html>