<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <title>EDIT NOTE</title>
</head>
<body class="bg-purple-100">

    <div class="flex items-center justify-between bg-purple-800 p-3">
        <h1 class="text-white text-md sm:text-lg md:text-xl lg:text-2xl xl:text-3xl">EDIT NOTE</h1>
        <a href="/notes" class="text-white flex items-center">
            <span class="material-icons">home</span>
            <span class="ml-1">View All Notes</span>
        </a>
    </div>

    <div class="flex items-center justify-center min-h-screen mt-2"> 
        <form action="{{ route('updateNote', ['id' => $note->id]) }}" method="POST" class="bg-purple-500 p-8 rounded-lg shadow-md w-full max-w-2xl">
            @method("PUT")
            @csrf

            <input type="text" id="title" name="title" value="{{ $note->title }}" maxlength="100" placeholder="Title" class="w-full p-2 mb-2 rounded-md bg-white text-purple-900 shadow-md" required>

            <input type="text" id="description" name="description" value="{{ $note->description }}" maxlength="255" placeholder="Description" class="w-full p-2 mb-2 rounded-md bg-white text-purple-900 shadow-md" required>

            <textarea id="content" name="content" maxlength="10000" placeholder="Content" required class="w-full h-80 p-2 rounded-md bg-white text-purple-900 shadow-md resize-none mb-4">{{ $note->content }}</textarea>

            <button type="submit" class="w-full bg-purple-700 text-white py-2 rounded-md hover:bg-purple-900 transition">Update Note</button>
        </form>
    </div>

</body>
</html>
