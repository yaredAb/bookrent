<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Book Rent | @yield('title', '')</title>
    @vite('resources/css/app.css')
</head>
<body>
    
    <div class="wrapper">
        <div class="section1">
            <img src="img/book-cover.png" alt="logo">
        </div>
        <div class="section2">
            <div class="title">
                <img src="img/book-cover2.png" alt="logo">
                <p>Book Rent</p>
            </div>

            @yield('content')

            </div>
    </div>
    
</body>
</html>