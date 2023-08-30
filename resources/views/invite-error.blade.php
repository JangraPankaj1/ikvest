<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Your token has been expired, you already used this link</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5 pt-5">
        <div class="alert alert-danger text-center">
            <p class="display-5">Your token has been expired, you already used this link.</p>
            <p class="display-5">Oops! Something is wrong.</p>
        </div>
    </div>
</body>
</html>
