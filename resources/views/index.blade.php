<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{route('store')}}" method="post">
        @csrf
        <input type="text" name="name" id="" placeholder="name"><br><br>
        <input type="text" name="email" id="" placeholder="email"><br><br>
        <input type="password" name="password" id="" placeholder="password"><br><br>
        <button type="submit">Submit</button>
    </form>
</body>
</html>