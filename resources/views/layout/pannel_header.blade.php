<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/style2.css">
    <title>Pannel</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <div class="wrapper">
        <div class="section1"><!--the menu bar-->
            <div class="head"><!--the logo and icon-->
                <img src="../../img/book-cover2.png" alt="logo">
                <p>Book Rent</p>
            </div>
            {{-- checking if the logged in user is an admin or book owner --}}
            @if (Auth::user()->privilage == "owner")
                <x-ownerNavs />
            @else
                <x-adminNavs />
            @endif

            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button class="logout">
                    <i class="fa-solid fa-right-from-bracket" style="color: #ffffff;"></i>
                    <p>logout</p>
                </button>
            </form>
        </div>
