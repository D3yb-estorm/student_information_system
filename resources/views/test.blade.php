<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <from6 action="{{url('/test/get-user-input')}}" method="post">
        @csrf
        <input type="text" name="user_input" id="">
        <br>
        <button type="submit"> send this to Laravel Controller</button>
    </form>
</body>
</html>