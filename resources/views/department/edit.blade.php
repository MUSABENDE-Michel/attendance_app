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
    @include('layouts.header')
        @include('layouts.navigation')
    <div class=" container ">
        <form class="mx-auto" style="max-width: 600px;" action="{{route('department.update',$department->id)}}" method="POST">
            @csrf
            @method('PUT')
            <h4>Edit Department</h4>
            <label for="name">Department Name</label>
            <input type="text" name="name" class="" value="{{$department->name}}">
            <button type="submit" class=" btn btn-success border-4 btn-sm" id="btn-edit">Save</button>

            @include('layouts.footer')
        </form>
</body>
</html>
