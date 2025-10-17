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
    </style>
</head>
<body>

    @include('layouts.header')
    @include('layouts.navigation')

    <h4 class="text-center mb-4">Edit Attendance Record</h4>

    
        <form action="{{ route('attendence.update', $attendence->id) }}" method="POST" class="mx-auto" style="max-width: 700px;">
            @csrf
            @method('PUT')

        <div class="mb-3">
            <label class="form-label">Student Name</label>
            <input type="text" class="form-control" value="{{ $attendence->student->std_name }}" disabled>
        </div>

       

        <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date" name="date" id="date" class="form-control" value="{{ $attendence->attendence_date }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Attendance Status</label>
            <select name="attendance_status" class="form-select" required>
                <option value="1" {{ $attendence->attendence_status ? 'selected' : '' }}>Present</option>
                <option value="0" {{ !$attendence->attendence_status ? 'selected' : '' }}>Absent</option>
            </select>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-success px-4">Update</button>
        </div>
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    </form>
            

    @include('layouts.footer')

</body>
</html>
