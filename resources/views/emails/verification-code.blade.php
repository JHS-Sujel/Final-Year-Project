<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .code {
            font-weight: bold;
            text-align: center;
            padding: 8px 20px;
            background-color: #f2f2f2;
            color: #111;
        }
    </style>
</head>
<body>
    <h1 class="code">{{ $user->verification_code }}</h1>
</body>
</html>