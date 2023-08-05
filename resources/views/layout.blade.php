<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    {{-- <main>@yield('content')</main> --}}
    <main>
        <div id="app">
            <vue-body></vue-body>
        </div>
    </main>
    <footer></footer>
    <script src="https://use.fontawesome.com/03f8a0ebd4.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="{{ mix('/js/app.js') }}"></script>
</body>

</html>
