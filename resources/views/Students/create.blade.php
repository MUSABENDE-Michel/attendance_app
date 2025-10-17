<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Your Custom CSS -->
    <link rel="stylesheet" href="{{ asset('asset/style.css') }}">

    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
        }

        header, nav, footer {
            flex-shrink: 0;
        }

        main {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f8f9fa;
            padding: 20px;
        }

        .form-container {
            width: 100%;
            max-width: 700px;
            background: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 12px rgba(0,0,0,0.1);
            animation: fadeIn 0.6s ease-in-out;
        }

        @keyframes fadeIn {
            0% { opacity: 0; transform: translateY(20px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        @media (max-width: 768px) {
            .form-container {
                max-width: 90%;
            }
        }
    </style>
</head>

<body>

    <!-- Header -->
    <header>
        @include('layouts.header')
    </header>

    <!-- Navigation -->
    <nav>
        @include('layouts.navigation')
    </nav>

    <!-- Main Content -->
    <main>
        <div class="form-container">
            <h4 class="mb-4 text-center">Add New Student</h4>

            <form action="{{ route('Students.store') }}" method="POST" class="border border-2 p-3">
                @csrf

                <div class="row">
                    <!-- Left Column -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="std_name" class="form-label">Student Name</label>
                            <input type="text" id="std_name" name="std_name" class="form-control" placeholder="Enter Name" required>
                        </div>

                        <div class="mb-3">
                            <label for="std_age" class="form-label">Student Age</label>
                            <input type="number" id="std_age" name="std_age" class="form-control" placeholder="Enter Age" required>
                        </div>

                        <div class="mb-3">
                            <label for="std_email" class="form-label">Student Email</label>
                            <input type="email" id="std_email" name="std_email" class="form-control" placeholder="Enter Email" required>
                        </div>

                        <div class="mb-3">
                            <label for="std_phone" class="form-label">Student Phone</label>
                            <input type="tel" id="std_phone" name="std_phone" class="form-control" placeholder="Enter Phone" required>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="std_gender" class="form-label">Student Gender</label>
                            <select id="std_gender" name="std_gender" class="form-select" required>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Others">Others</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="std_dpt" class="form-label">Student Department</label>
                            <select id="std_dpt" name="std_dpt" class="form-select" required>
                                @foreach($departments as $dpt_data)
                                    <option value="{{ $dpt_data->id }}">{{ $dpt_data->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="std_level" class="form-label">Student Level</label>
                            <input type="text" id="std_level" name="std_level" class="form-control" placeholder="Enter Level" required>
                        </div>
                    </div>
                </div>

                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-primary px-5">Register</button>
                </div>
            </form>
        </div>
    </main>

    <!-- Footer -->
    <footer class="mt-auto">
        @include('layouts.footer')
    </footer>

</body>
</html>
