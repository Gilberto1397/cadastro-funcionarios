<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{asset('/css/app.css')}}" rel="stylesheet">
    <title>@yield('title')</title>
</head>
<body class="bg-gray-100">

@isset($message)
    <div class="font-regular m-auto mt-5 flex justify-center relative mb-4 block w-96 rounded-lg bg-gradient-to-tr from-pink-600 to-pink-400 p-4 text-base leading-5 text-white opacity-100">
        {{$message}}
    </div>
@endisset

@yield('content')

</body>
</html>
