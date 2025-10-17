<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="{{ asset('asset/style.css') }}">
</head>
<body>

    <div class="content-area"id="content_area">
        <a href="{{route('department.create')}}" class=" btn btn-primary mt-2 m-2 btn-sm text-end ">Add New Department</a>

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>ACTION</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($department as $dpt_data )
            <tr>
                <td>{{$dpt_data->id}}</td>
                <td>{{$dpt_data->name}}</td>
                <td>
                    <div class="d-flex gap-3">
                    <a class=" btn btn-primary btn-sm"  id="btn-update" href="{{route('department.edit', $dpt_data->id)}}">update</a>
                    <form action="{{route('department.destroy',$dpt_data->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                    <button class=" btn btn-danger btn-sm" type="delete"  id="btn-delete">Delete</button>
                    </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
        </table><div class="pagination justify-content-center">
            {{-- Pagination links --}}
            {{ $department->links("pagination::bootstrap-4") }}
        </div>


    </div>


</body>
</html>
