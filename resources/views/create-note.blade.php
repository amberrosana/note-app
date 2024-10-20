<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CREATE NOTE</title>
</head>
<body>
    <form action="{{ route('store-note') }}" method="POST">
        @csrf
        <label for="title">Title: </label>
        <input type="text" id="title" name="title" maxlength="100" required>
        <label for="description">Description </label>
        <input type="text" id="description" name="description" maxlength="255" required>
        <label for="content"></label>
        <input type="text" id="content" name="content" maxlength="content" placeholder="Type your text here" style="width: 300px; height: 300px;" required>
        <button type="submit">Save Note</button>
    </form>

    <form action="{{ route('all-notes') }}" method="GET">
        <button type="submit">Back to Notes List</button>
    </form>
</body>
</html>