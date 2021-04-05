<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="token" content="{{csrf_token()}}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>To Do List Sementara</title>
</head>
<body>
    <form action="{{url('/todolist')}}" method="POST">
        @csrf
        <input type="text" name="task" placeholder="New to do">
        @error('task')
            <span style="color: red">{{ $message }}</span>
        @enderror
        <input type="submit">
    </form>

    <br>

    <ol>
        @foreach ($todos as $todo)
            <li>
                {{$todo->task}} &nbsp;
                <a href="{{url('/todolist') . '/' . $todo->id}}">Edit</a> &nbsp;
                <button onclick="delete_data('{{$todo->id}}')">Delete</button>
            </li>
        @endforeach
    </ol>
</body>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    function delete_data(id) {
        $.ajax({
            url: "todolist/delete/" + id,
            type: "delete",
            data: {
                '_token': $('meta[name="token"]').attr('content')
            },
            success: function(response) {
                window.location.reload()
            }
        });
    }
</script>
</html>
