<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Manage Students</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <link rel="stylesheet" href="{{ asset('asset/style.css') }}">

  <style>
    html, body {
      height: 100%;
      margin: 0;
      padding: 0;
      background-color: #f8f9fa;
      display: flex;
      flex-direction: column;
    }

    /* Navigation bar design */
    .custom-nav {
      background-color: #6c757d;
      min-height: 80px;
      padding: 20px;
      font-size: 1.2rem;
      font-weight: 600;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .custom-nav a {
      color: white;
      margin: 0 20px;
      text-decoration: none;
    }

    .custom-nav a:hover {
      text-decoration: underline;
    }

    /* Content styling */
    .content-area {
      flex: 1;
      padding: 30px;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .table-container {
      width: 100%;
      max-width: 1200px;
      background: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      overflow-x: auto;
    }

    .table {
      margin-top: 20px;
    }

    #btn-update, #btn-delete {
      width: 100%;
    }

    #btn-update {
      background-color: #0d6efd;
      border: none;
    }

    #btn-update:hover {
      background-color: #0b5ed7;
    }

    #btn-delete {
      background-color: #dc3545;
      border: none;
    }

    #btn-delete:hover {
      background-color: #bb2d3b;
    }

    footer {
      background-color: #343a40;
      color: white;
      text-align: center;
      padding: 10px;
    }

    @media (max-width: 768px) {
      .table-container {
        padding: 10px;
      }
      .custom-nav {
        flex-direction: column;
        text-align: center;
      }
    }
    #table {
    margin-bottom: 0; /* Removes bottom margin */
    padding-bottom: 0; /* Ensures no extra padding */
}

  </style>
</head>

<body>
    @include('layouts.header')

    <!-- NAVIGATION SEPARATE FROM HEADER -->
    <div class="cutom-nav">
      @include('layouts.navigation')
    </div>

    <div class="content-area" id="content_area">
      <div class="container">

        {{-- Tabs --}}
        <ul class="nav nav-tabs mb-4" id="attendanceTabs" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="today-tab" data-bs-toggle="tab" data-bs-target="#today" type="button" role="tab">
              Today's Attendance
            </button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="all-tab" data-bs-toggle="tab" data-bs-target="#all" type="button" role="tab">
              All Attendance
          </li>
        </ul>

        {{-- Tab content --}}
        <div class="tab-content" id="attendanceTabsContent">

                   {{-- Today’s Attendance Tab --}}
<div class="tab-pane fade show active" id="today" role="tabpanel" aria-labelledby="today-tab">
  <div class="d-flex justify-content-end">
    <a href="{{ route('attendence.create') }}" class="btn btn-success mb-3 btn-sm">Make Attendance</a>
  </div>

  @if(session('success'))
  <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif

  <table class="table table-bordered table-striped mb-5">
    <thead class="table-dark">
      <tr>
        <th>Student Name</th>
        <th>Department</th>
        <th>Level</th>
        <th>Date</th>
        <th>Attendance Status</th>
        <th>Attendance Rate</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($todayAttendance as $student)
        <tr>
          <td>{{ $student->student->std_name }}</td>
          <td>{{ $student->student->department->name }}</td>
          <td>{{ $student->student->std_level }}</td>
          <td>{{ $student->attendence_date }}</td>
          <td>{{ $student->attendence_status ? 'Present' : 'Absent' }}</td>
          <td>{{ $student->attendence_status ? '100%' : '0%' }}</td>
          <td>
            <a class="btn btn-primary btn-sm w-100" href="{{ route('attendence.edit', $student->id) }}">Update</a>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>

  <div class="pagination justify-content-center">
    {{ $todayAttendance->links("pagination::bootstrap-4") }}
  </div>
</div>


          {{-- All Attendance Tab --}}
<div class="tab-pane fade" id="all" role="tabpanel" aria-labelledby="all-tab">
  <div class="d-flex justify-content-end">
    <a href="{{ route('attendence.create') }}" class="btn btn-success mb-3 btn-sm">Make Attendance</a>
  </div>

  <table class="table table-bordered table-striped mb-5">
    <thead class="table-dark">
      <tr>
        <th>Student Name</th>
        <th>Department</th>
        <th>Level</th>
        <th>Date</th>
        <th>Attendance Status</th>
        <th>Attendance Rate</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($allAttendance as $student)
        <tr>
          <td>{{ $student->student->std_name }}</td>
          <td>{{ $student->student->department->name }}</td>
          <td>{{ $student->student->std_level }}</td>
          <td>{{ $student->attendence_date }}</td>
          <td>{{ $student->attendence_status ? 'Present' : 'Absent' }}</td>
          <td>{{ $student->attendence_status ? '100%' : '0%' }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>

  <div class="pagination justify-content-center">
    {{ $allAttendance->links("pagination::bootstrap-4") }}
  </div>
</div>

    </div>

    @include('layouts.footer')

</body>
</html>
