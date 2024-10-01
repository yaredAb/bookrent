<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div class="min-h-screen">
        <div class="flex justify-between bg-slate-200 align-center p-6">
            <div class="flex">
                <img src="../img/book-cover2.png" alt="logo" class="w-14">
                <p class="text-xl"><a href="{{route('home')}}">Book Rent</a></p>
            </div>
            <div class="flex gap-5 text-sm font-bold">
                <a href="{{route('owner_login')}}" class="text-gray-600 hover:text-gray-900 transition ease-in duration-200">Login As Owner</a>
                <a href="{{ route('admin_login') }}" class="text-gray-600 hover:text-gray-900 transition ease-in duration-200">Login As Admin</a>
            </div>
        </div>
        <main class=" mt-10">
            <div class="py-4 bg-gray-100">
                <p class="mx-6 text-2xl font-semibold">Books to rent</p>
            </div>
            <div class="flex flex-wrap">
                @if (count($books) > 0)
                @foreach ($books as $book)
                    <div class="p-5 w-44">
                        <img src="{{asset('storage/BookImg/'.$book->cover)}}" alt="cover-1" class="w-40">
                        <p class="text-sm font-bold mt-1">{{$book->title}}</p>
                        <p class="text-sm mt-1 text-gray-500">{{$book->price}} ETB</p>
                        <form action="{{route('rent', $book->id)}}" method="post">
                            @csrf
                            @method('PUT')
                            <button class="px-5 bg-teal-600 hover:bg-teal-900 cursor-pointer transition ease-in duration-200 text-white rounded mt-1">Rent</button>
                        </form>
                    </div>
                @endforeach
                @else
                    <p class="text-center text-xl  font-bold text-gray-700">No Books Avaliable Yet</p>
                @endif
            </div>
        </main>
    </div>
</body>
</html>
