<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite('resources/css/app.css')
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <title>Notes</title>
  </head>

  <body>
    <div class="flex items-center justify-center bg-purple-800 p-2">
      <h1 class="prose text-white text-md sm:text-lg md:text-xl lg:text-2xl xl:text-3xl"><a href="/notes">MyNotes</a></h1>
    </div>

    <div class="flex w-full items-center justify-center">
      <form action="{{ route('notes') }}" method="GET" class="flex w-full max-w-screen-lg items-center space-x-2 px-4">
        <div class="relative flex-grow p-1">
          <input class="bg-white-500 w-full py-2 pl-10 pr-3 shadow-md focus:outline-purple-900" type="search" name="search" id="search" placeholder="&#x1F50E;&#xFE0E;" value="{{ $search }}" />
        </div>
        <button class="whitespace-nowrap rounded-md bg-purple-500 px-3 py-2 text-white active:bg-purple-300">Search</button>
        <a href="{{ url('/notes') }}" class="whitespace-nowrap text-violet-900 active:text-violet-500">Reset</a>
      </form>
    </div>

      <div class="grid grid-cols-1 gap-4 p-4 sm:grid-cols-2 lg:grid-cols-3">

        <form action="{{ route('createNote') }}" method="GET">
            <button type="submit" class="items-center w-full rounded-lg bg-gradient-to-tr from-purple-900 to-purple-500 text-white  shadow-md flex flex-col justify-between"><img class="w-52 h-52" src="{{ asset('assets/plus.png') }}"></button>
        </form>

        @foreach ($notes as $note)
        <div class="h-52 p-4 w-full rounded-lg bg-purple-500 text-white  shadow-md flex flex-col justify-between text-sm sm:text-md md:text-lg xl:text-xl">
          <div>
            <h2 class="text-lg font-bold text-purple-950">{{ $note->title }}</h2>
            <b class="line-clamp-4 font-normal text-white">{{ $note->content }}</b>
          </div>

          <div class="mt-2 flex justify-end space-x-2">
            <form action="{{ route('viewNote', ['id' => $note->id]) }}" method="GET">
              <button type="submit" class="text-white"><span class="material-icons">visibility</span></button>
            </form>

            <form action="{{ route('editNote', ['id' => $note->id]) }}" method="GET">
              <button type="submit" class="text-white"><span class="material-icons">edit</span></button>
            </form>

            <form action="{{ route('deleteNote', ['id' => $note->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this note?')">
              @method('DELETE') @csrf
              <button type="submit" class="text-white"><span class="material-icons">delete</span></button>
            </form>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </body>
</html>
