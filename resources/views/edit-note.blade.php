<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite('resources/css/app.css')
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <title>EDIT NOTE</title>
  </head>
  <body class="bg-purple-100">
    <div class="flex items-center justify-between bg-purple-800 p-3">
      <h1 class="text-md text-white sm:text-lg md:text-xl lg:text-2xl xl:text-3xl">EDIT NOTE</h1>
      <a href="/notes" class="flex items-center text-white">
        <span class="material-icons">home</span>
        <span class="ml-1">View All Notes</span>
      </a>
    </div>

    <div class="mt-8 flex items-center justify-center">
      <form action="{{ route('updateNote', ['id' => $note->id]) }}" method="POST" class="w-full max-w-2xl rounded-lg bg-purple-500 p-8 shadow-md">
        @method("PUT") 
        @csrf

        <div class="mb-2">
          <input type="text" id="title" name="title" value="{{ $note->title }}" maxlength="100" placeholder="Title" class="w-full rounded-md bg-white p-2 font-bold text-purple-900 shadow-md" />
        </div>

        <div class="mb-2">
          <input type="text" id="description" name="description" value="{{ $note->description }}" maxlength="255" placeholder="Description" class="w-full rounded-md bg-white p-2 text-purple-900 shadow-md" />
        </div>

        <textarea id="content" name="content" maxlength="10000" placeholder="Content" required class="mb-4 h-96 w-full resize-none rounded-md bg-white p-2 text-purple-900 shadow-md">{{ $note->content }}</textarea>

        <button type="submit" class="w-full rounded-md bg-purple-700 py-2 text-white transition hover:bg-purple-900">Update Note</button>
      </form>
    </div>
  </body>
</html>
