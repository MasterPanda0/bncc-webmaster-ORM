<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit todo</title>
</head>
<body>
    <form action="{{url('/todolist') . '/' . $todo->id}}" method="POST">
        @csrf
        <input type="text" name="task" value="{{$todo->task}}">
        <input type="submit">
    </form>
</body>
</html>
