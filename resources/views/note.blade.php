<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <title>View Note</title>

</head>
<body>

    <div class="flex items-center justify-between bg-purple-800 p-3">
        <h1 class="text-white text-md sm:text-lg md:text-xl lg:text-2xl xl:text-3xl">VIEW NOTE</h1>
        <a href="/notes" class="text-white flex items-center">
            <span class="material-icons">home</span>
            <span class="ml-1">View All Notes</span>
        </a>
    </div>

    <div class="flex items-center justify-center m-8">
        <div class="bg-white p-5 rounded-lg shadow-lg w-full max-w-3xl relative">
            <div class="absolute top-4 right-4 flex space-x-4">
                <form action="{{ route('editNote', ['id' => $note->id]) }}" method="GET">
                    <button type="submit" class="text-purple-700 hover:text-purple-900 transition">
                        <span class="material-icons">edit</span>
                    </button>
                </form>

                <form action="{{ route('deleteNote', ['id' => $note->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this note?')">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="text-red-600 hover:text-red-800 transition">
                        <span class="material-icons">delete</span>
                    </button>
                </form>

                <form action="{{ route('archive', ['id' => $note->id]) }}" method="POST">
                    @method('PATCH')
                    @csrf
                    <button type="submit" class="text-gray-600 hover:text-gray-800 transition">
                        <span class="material-icons">archive</span>
                    </button>
                </form>
            </div class="text-sm md:text-md lg:text-lg xl:text-md">

            <h2 class="text-purple-900 text-3xl font-bold mb-2 mt-8">{{ $note->title }}</h2> 
            <p class="text-purple-700 italic mb-2">{{ $note->description }}</p> 
            <div class="overflow-y-auto overflow-x-hidden min-h-80 justify-center p-4 border rounded-lg shadow-inner bg-purple-50">
                <p class="text-purple-800 whitespace-pre-wrap">{{ $note->content }}</p> 
            </div>
            <p class="text-gray-500 mt-1 text-sm md:text-md lg:text-lg xl:text-md">
                Updated on <span class="font-semibold">{{ $note->updated_at }}</span><br>
                Created on <span class="font-semibold">{{ $note->created_at }}</span>
            </p>
        </div>
    </div>

</body>
</html>
