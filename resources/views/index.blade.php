
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Todo List</title>
</head>
<body>

    <div class="container">

        <div class="row mt-5 mb-5">

            <div class="col-md-6">
                <h3>Tasks To do</h3>
            </div>
            <div class="col-md-6 text-right">
                <a href="{{ route('create.todo') }}" class="btn btn-primary">Create Todo</a>
            </div>
            <div class="col-md-6 text-right">
                <a href="{{ url('/dashboard') }}" class="btn btn-secondary">Logout</a>
            </div>

        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <th>#</th>
                            <th>Todo</th>
                            <th>Status</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                        </thead>
                        @foreach($todos as $todo)
                        <tr>
                            <td>{{ $todo -> id }}</td>
                            <td>
                                {{ $todo -> todo_name }}<br>
                                <a href="{{ route('edit', ['id' => $todo->id]) }}">Edit</a> /
                                <a href="{{ route('delete', ['id' => $todo->id]) }}">Delete</a> /

                                @if($todo->is_complete == 0)
                                    <a href="{{ route('complete', ['id' => $todo->id]) }}">Complete</a>
                                @else
                                    <a href="{{ route('notcomplete', ['id' => $todo->id]) }}">Not Complete</a>
                                @endif
                            </td>
                            <td>
                                @if( $todo -> is_complete == 0 )
                                    <span class="badge badge-warning">Not Completed</span>
                                @else
                                    <span class="badge badge-success">Completed</span>
                                @endif
                            </td>
                            <td>{{ $todo -> created_at }}</td>
                            <td>{{ $todo -> updated_at }}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>