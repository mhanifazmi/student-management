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
            <div class="col-6 mx-auto">
                <h3>View Student</h3>
                <div class="form-group mb-3">Name</label>
                    <input disabled name="name" type="text" class="form-control" placeholder="Enter name" value="{{ $student->name }}">
                    @error('name')
                    <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label>Date of Birth</label>
                    <input disabled name="birth_at" id="birth_at" type="text" class="form-control" placeholder="Date of Birth" value="{{ $student->birth_at->format('d M Y') }}">
                    @error('birth_at')
                    <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label>Age</label>
                    <input disabled value="{{ $student->age }}" readonly name="age" id="age" type="number" class="form-control" placeholder="Age">
                </div>
                <div class="form-group mb-3">
                    <label>Classroom</label>
                    <input disabled name="class_name" type="text" class="form-control" placeholder="Enter name" value="{{ $student->class_name }}">
                </div>
                <div class="form-group mb-3" style="text-align: right">
                    <a href="{{ route('student.index') }}"><button class="btn btn-danger">Back</button></a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
    <script>
        function calculateAge(){
            var birth_at = document.getElementById('birth_at').value;
            var birthday = +new Date(birth_at);
            var age = document.getElementById('age');
            age.value = ~~ ((Date.now() - birthday) / (31557600000));
        }
    </script>
</body>

</html>
