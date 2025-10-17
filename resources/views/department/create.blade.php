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
       <div class="container">
    <div class="form -mr-3 justfy-content-center">
        <form class="form-controller-sm form-control-lg border-5" action="{{Route('department.store')}}" method="POST">
            @csrf
            <h4>Add New Department</h4>
            <label for="name">Department Name:</label><br>
            <input type="text" name="name" class="">
            <button type="submit" class="btn-primary btn-sm">Add</button>
        </form>
    </div>
</div>
    @include('layouts.footer')
</body>
</html>