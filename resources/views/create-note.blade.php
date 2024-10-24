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
        <input type="text" id="title" name="title"placeholder="Title" maxlength="100"><br>
        <input type="text" id="description" name="description" placeholder="Description" maxlength="255"><br>
        <input type="text" id="content" name="content" maxlength="10000" placeholder="Type your text here" required><br>
        <button type="submit">Save Note</button><br>
    </form>

    <form action="{{ route('notes') }}" method="GET">
        <button type="submit">View All Notes</button>
    </form>
</body>
</html>