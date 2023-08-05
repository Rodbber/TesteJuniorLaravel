<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <style>
        table,
        th,
        td {
            border: 1px solid;
        }

        table {
            border-collapse: collapse;
        }

        td{
            padding: 1rem;
        }
    </style>
</head>

<body>
    <main>
        @yield('resume-table')
        <table>
            <thead>
                @yield('head-table')
            </thead>
            <tbody>
                @yield('body-table')
            </tbody>
        </table>
        @yield('footer-table')
    </main>

</body>

</html>
