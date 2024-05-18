<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Application</title>
        <!-- Include CSS directly -->
        <link rel="stylesheet" href="http://18.169.15.42:5173/resources/css/app.css">
    </head>
    <body>
        <div id="app"></div>
        <!-- Include JS directly, ensure @vite/client for HMR is included if needed -->
        <script type="module" src="http://18.169.15.42:5173/@vite/client"></script>
        <script type="module" src="http://18.169.15.42:5173/resources/js/app.js"></script>
    </body>
</html>
