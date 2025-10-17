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
      <div class="d-flex justify-content-end">
        <a href="{{ route('Students.create') }}" class="btn btn-success mb-3 btn-sm">Add New Student</a>
      </div>
      <div class="table-responsive">
      <table class="table table-bordered table-striped">
        <thead class="table-dark">
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Age</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Gender</th>
            <th>Department</th>
            <th>Level</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($student_data as $data)
            <tr>
              <td>{{ $data->id }}</td>
              <td>{{ $data->std_name }}</td>
              <td>{{ $data->std_age }}</td>
              <td>{{ $data->std_email }}</td>
              <td>{{ $data->std_phone }}</td>
              <td>{{ $data->std_gender }}</td>
              <td>{{ $data->department->name}}</td>
              <td>{{ $data->std_level }}</td>
              <td>
                <div class="d-flex flex-column gap-2">
                    <div class="d-flex gap-2">
                  <a class="btn btn-primary btn-sm" id="btn-update" href="{{ route('Students.edit', $data->id) }}">Update</a>
                  <form action="{{ route('Students.destroy', $data->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" id="btn-delete" type="submit">Delete</button>
                  </div>
                  </form>
                </div>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
      <div class="pagination justify-content-center">
        {{-- Pagination links --}}
        {{ $student_data->links("pagination::bootstrap-4") }}
    </div>
    </div>

  </div>


  @include('layouts.footer')

  <!-- Bootstrap Bundle JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
