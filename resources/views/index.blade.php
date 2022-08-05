<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
</head>

<body class="antialiased" style="margin-top: 50px;">
    <div class="container">
        <div class="row">
            <div class="d-flex justify-content-between">
                <h3>Student Listing </h3>
                <div class="d-inline-block" style="width: 40%; float: right; text-align: right">
                    <div class="d-inline-block">
                        <form action="{{ route('student.index') }}" method="GET">
                            <div class="input-group">
                                <input name="search" type="text" class="form-control" placeholder="Search">
                                <div class="input-group-prepend">
                                    <button class="input-group-text" style="border-radius: 0">Search</button>
                                </div>
                                <div class="input-group-prepend">
                                    <a style="text-decoration: none" href="{{ route('student.index') }}"><button type="button" class="input-group-text" style="border-top-left-radius: 0; border-bottom-left-radius: 0;">Reset</button></a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="d-inline-block">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <a href="{{ route('student.create') }}"><button class="input-group-text bg-primary" style="color: #ffffff">Create</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>#</td>
                    <td>Name</td>
                    <td>Date of Birth</td>
                    <td>Age</td>
                    <td>Class Name</td>
                    <td>Actions</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $key => $student)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->birth_at->format('d M Y') }}</td>
                        <td>{{ $student->age }}</td>
                        <td>{{ $student->class_name }}</td>
                        <td>
                            <a href="{{ route('student.show', $student) }}">View</a> |
                            <a href="{{ route('student.edit', $student) }}">Edit</a> |
                            <a href="{{ route('student.destroy', $student) }}">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
</body>

</html>
