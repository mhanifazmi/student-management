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
                <h3>Create Student</h3>
                <form method="POST">
                    @csrf
                    <div class="form-group mb-3">Name</label>
                        <input name="name" type="text" class="form-control" placeholder="Enter name">
                        @error('name')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                        
                    </div>
                    <div class="form-group mb-3">
                        <label>Date of Birth</label>
                        <input name="birth_at" onchange="calculateAge()" id="birth_at" type="date" class="form-control" placeholder="Date of Birth" value="{{ date('today') }}">
                        @error('birth_at')
                        <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label>Age</label>
                        <input readonly name="age" id="age" type="number" class="form-control" placeholder="Age">
                    </div>
                    <div class="form-group mb-3">
                        <label>Classroom</label>
                        <select name="classroom_id" class="form-control">
                            @foreach ($classroom as $class)
                                <option value="{{ $class->id }}">{{ $class->name }}</option> 
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3" style="text-align: right">
                        <a href="{{ route('student.index') }}"><button type="button" class="btn btn-danger">Back</button></a>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
    <script>
        function calculateAge(){
            var birth_at = document.getElementById('birth_at').value;
            var value = document.getElementById('age');

            var today = new Date();
            var birthDate = new Date(birth_at);
            var age = today.getFullYear() - birthDate.getFullYear();
            var m = today.getMonth() - birthDate.getMonth();
            if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
                age--;
            }
            value.value = age;
        }
    </script>
</body>

</html>
