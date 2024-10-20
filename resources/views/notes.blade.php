<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Note App</title>
</head>
<body>
    <h1>Notes</h1>
    @foreach ($users as $user)
        <div>
            Title: {{ $user->title }}<br>
            Description: {{ $user->description }}<br>
            {{ $user->content }}
        </div>
    @endforeach
</body>
</html>