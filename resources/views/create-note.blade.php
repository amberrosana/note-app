<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>CREATE NOTE</title>
</head>
<body>
    <h1>CREATE NOTE</h1>
    <form action="{{ route('storeNote') }}" method="POST">
        @csrf
        <label for="title">Title: </label>
        <input type="text" id="title" name="title" maxlength="100"><br>
        <label for="description">Description </label>
        <input type="text" id="description" name="description" maxlength="255"><br>
        <label for="content"></label>
        <input type="text" id="content" name="content" maxlength="content" placeholder="Type your text here" required><br>
        <button type="submit">Save Note</button><br>
    </form>

    <form action="{{ route('notes') }}" method="GET">
        <button type="submit">View All Notes</button>
    </form>
</body>
</html>