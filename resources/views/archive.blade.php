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
    <div class="flex items-center justify-between bg-purple-800 p-3">
      <h1 class="text-white text-md sm:text-lg md:text-xl lg:text-2xl xl:text-3xl">Archive</h1>

        <a href="/notes" class="text-white flex items-right">
                <span class="material-icons">home</span>
                <span class="ml-1">View All Notes</span>
        </a>
    </div>

    <div class="flex w-full items-center justify-center">
        <form action="{{ route('viewArchive') }}" method="GET" class="flex w-full max-w-screen-lg items-center space-x-2 px-4">
            <div class="relative flex-grow p-1">
                <input class="bg-white-500 w-full py-2 pl-10 pr-3 shadow-md focus:outline-purple-900" type="search" name="search" id="search" placeholder="" value="{{ $search }}" />
            </div>
            <button class="whitespace-nowrap rounded-md bg-purple-500 px-3 py-2 text-white hover:shadow-md hover:bg-purple-900 active:bg-purple-300">&#x1F50E;&#xFE0E;</button>
            <a href="{{ url('/notes/archive') }}" class="material-icons whitespace-nowrap text-violet-900 hover:text-indigo-700 active:text-violet-500">refresh</a>
        </form>
    </div>

      <div class="grid grid-cols-1 gap-6 p-8 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5">

        @foreach ($notes as $note)
        <div class="h-52 p-4 w-full rounded-lg bg-purple-500 text-white  shadow-md flex flex-col justify-between text-sm sm:text-md md:text-lg xl:text-xl transition-shadow duration-200 hover:shadow-lg hover:shadow-purple-300">
          <div>
            <h2 class="text-xl font-bold text-purple-950">{{ $note->title }}</h2>
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

            <form action="{{ route('archive', ['id' => $note->id]) }}" method="POST">
                  @method('PATCH')
                  @csrf
                  <button type="submit" class="text-white"><span class="material-icons">unarchive</span></button>
              </form>

          </div>

        </div>
        @endforeach
      </div>
    </div>
  </body>
</html>
