<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite('resources/css/app.css')
</head>
<body>
    <div>
        <div class="py-5 shadow-md px-5">
            <x-header />
            <main class="p-5">
                <x-topItem />
                <x-filter />
                <x-categoryTitle />
                <div class="mt-5 place-items-center grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-2">
                    @foreach ($books as $book)
                        <x-card title="{{ $book->title }}" price="{{ $book->price }}" cover="{{$book->cover}}"  />
                    @endforeach
                </div>
            </main>
        </div>
</body>
</html>
