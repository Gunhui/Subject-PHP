<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @if(Auth::check())
        <h1>로그인 되셨습니다.</h1>
        
    @else
        <h1>로그인 실패하셨어요.</h1>
    @endif
</body>
</html>