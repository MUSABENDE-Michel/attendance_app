<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Attendance Form</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('asset/style.css') }}">
</head>
<body>

    @include('layouts.header')

    <div class="container-fluid">
        <div class="row">
            <!-- Navigation Area -->
            <div class="col-md-3">
                @include('layouts.navigation')
            </div>

            <!-- Form Area (Right Side of Navigation) -->
            <div class="col-md-7">
                <div class="card mt-4 p-4 shadow">
                    <h4 class="text-primary">Attendance Form</h4>
                    <h5 class="text-secondary">
                        Make attendance on <strong class="text-success">{{ $today}}</strong> 
                        and made by <strong class="text-success">{{ session('name')}}</strong>
                    </h5>

           @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

                    <form action="{{ route('attendence.store') }}" method="POST" class="d-flex flex-column align-items-start gap-3">
                        @csrf
                        <div class="d-flex gap-3">
                            <div>
                                <label for="std_name" class="form-label">Student Name</label>
                                <select name="std_id" id="std_id" class="form-select">
                                    <option value="">Select Student</option>
                             @foreach($unattendedStudent as $student)
                                    <option value=" {{$student->id  }}">{{ $student->std_name }} {{ $student->std_email }}</option>
                                    @endforeach
                                </select>
                            </div>
                    
                            <div>
                                <label for="attendance" class="form-label">Attendance Status</label>
                                <select name="attendance_status" id="attendance" class="form-select">
                                    <option value="">Select Status</option>
                                    <option value="present">Present</option>
                                    <option value="absent">Absent</option>
                                </select>
                            </div>
                    
                            <div>
                                <label for="date" class="form-label">Date</label>
                                <input type="date" name="date" id="date" value="{{ now()->toDateString() }}" class="form-control">
                            </div>
                        </div>
                    
                        <div class="mt-2">
                            <button type="submit" name="action" value="continue" class="btn btn-success">Submit and Continue</button>
                            <button type="submit" name="action" value="review" class="btn btn-primary">Submit and Review</button>
                        </div>
                    </form>
                    
                    
                </div>
            </div>
        </div>
    </div>

    @include('layouts.footer')

</body>
</html>
