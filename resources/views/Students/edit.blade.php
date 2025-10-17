<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('asset/style.css') }}">
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background-color: #f8f9fa;
        }
        .edit-form-container {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px 10px;
        }
        .container {
            max-width: 700px;
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 12px rgba(0,0,0,0.1);
        }
        @media (max-width: 768px) {
            .container {
                max-width: 90%;
            }
        }
    </style>
</head>
<body>

    @include('layouts.header')
    @include('layouts.navigation')

    <div class="edit-form-container">
        <div class="container">
            <h4 class="mb-4 text-center">Edit Student</h4>
            @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

            <form action="{{ route('Students.update', $student->id) }}" method="POST" class="mx-auto" style="max-width: 700px;">
                @csrf
                @method('PUT')

                <div class="row" >
                    <!-- Left Section -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="std_name">Student Name</label>
                            <input type="text" id="std_name" name="std_name" value="{{ $student->std_name }}" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="std_age">Student Age</label>
                            <input type="number" id="std_age" name="std_age" value="{{ $student->std_age }}" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="std_email">Student Email</label>
                            <input type="email" id="std_email" name="std_email" value="{{ $student->std_email }}" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="std_phone">Student Phone</label>
                            <input type="tel" id="std_phone" name="std_phone" value="{{ $student->std_phone }}" class="form-control" required>
                        </div>
                    </div>

                    <!-- Right Section -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="std_gender">Student Gender</label>
                            <select id="std_gender" name="std_gender" class="form-select" required>
                                <option value="Male" {{ $student->std_gender == 'Male' ? 'selected' : '' }}>Male</option>
                                <option value="Female" {{ $student->std_gender == 'Female' ? 'selected' : '' }}>Female</option>
                                <option value="Others" {{ $student->std_gender == 'Others' ? 'selected' : '' }}>Others</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="std_dpt">Student Department</label>
                            <select id="std_dpt" name="std_dpt" class="form-select" required>
                                @foreach($departments as $department)
                                    <option value="{{ $department->id }}" {{ $student->std_dpt == $department->id ? 'selected' : '' }}>
                                        {{ $department->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="std_level">Student Level</label>
                            <input type="text" id="std_level" name="std_level" value="{{ $student->std_level }}" class="form-control" required>
                        </div>
                    </div>
                </div>

                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-success">Save Changes</button>
                </div>
            </form>
        </div>
    </div>

    @include('layouts.footer')

</body>
</html>
