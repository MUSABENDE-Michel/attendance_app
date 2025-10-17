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
        <div class="card-nav bg-dark text-start" id="navbar">
                       
            <div class="menu">
                <nav class="text-start">
                    <button class="btn"><a href="{{ Route('home') }}">Home</a></button><br>
                    <button class="btn"><a href="{{Route('department.index')}}">Department</a></button><br>
                    <button class="btn"><a href="{{Route("Students.index")}}">Student</a></button><br>
                    <button class="btn"><a href="{{Route('attendence.index')}}">Attendance</a></button><br>
                    <button class="btn"><a href="#section5">Contact</a></button><br>
                        <button class="btn"><a href="#section6">About</a></button><br>
                        <button class="btn"><a href="{{Route('register.store')}}">Sign Up</a></button><br>
                    <button class="btn"><a href="#section8">Logout</a></button>
                </nav>
            
        </div>

        </div>
</body>
</html>