<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
        }

        .wrapper {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .header {
            background-color: #001f3f; /* Navy Blue */
            color: white;
            padding: 1rem;
            text-align: center;
            font-weight: bold;
            font-size: 1.5rem;
        }

        .navbar-custom {
            background-color: #007bff; /* Royal Blue */
        }

        .content {
            flex: 1;
            background-color: #e6f2ff; /* Light blue background */
            padding: 2rem;
        }

        .table-primary-custom {
            background-color: #87cefa; /* Sky blue */
        }

        .status-present {
            color: #28a745; /* Green */
            font-weight: bold;
        }

        .status-absent {
            color: #dc3545; /* Red */
            font-weight: bold;
        }

        .footer {
            background-color: #343a40; /* Dark gray */
            color: white;
            padding: 1rem;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="header">
            STUDENT MANAGEMENT SYSTEM
        </div>

        <nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Dashboard</a>
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Attendance</a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="#">Profile</a>
                        </li> --}}
                    </ul>
                    <span class="navbar-text text-white">
                        Welcome, {{ session('name') }}
                    </span>
                </div>
            </div>
        </nav>

        <div class="content">
            <h3 class="text-primary">Attendance for {{ session('name') }}</h3>

            <table class="table table-bordered table-striped mt-3">
                <thead class="table-primary-custom text-dark">
                    <tr>
                        <th>Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($myAttendence as $att)
                        <tr>
                            <td>{{ $att->attendence_date }}</td>
                            <td>
                                @if($att->attendence_status == 1)
                                    <span class="status-present">Present</span>
                                @else
                                    <span class="status-absent">Absent</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pagination justify-content-center">
                {{-- Pagination links --}}
                {{ $myAttendence->links("pagination::bootstrap-4") }}
            </div>
        </div>

        <div class="footer">
            &copy; {{ date('Y') }} Michel Copyright </div>
    </div>
</body>
</html>
