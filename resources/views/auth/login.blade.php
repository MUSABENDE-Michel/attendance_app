<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<style>
form{
    width: 25%;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #f9f9f9;
    box-shadow: 0 2px 10px rgba(193, 198, 206, 0.1);
    font-family: Arial, sans-serif;
    font-size: 16px;
    color: #333;
    line-height: 1.5;
    text-align: left;
    margin-top:40px;

}

P{
    text-align: center;
    font-size: 24px;
    color:blue;
    margin-bottom: 20px;
    font-weight:700;

}
label{
    font-weight: 900;
}
</style>
</head>
<body>
    @if(session('success'))
    <div style="color:green; text-align:center;">
        {{ session('success') }}
    </div>
    @endif
    @if(session('error'))
    <div style="color:red; text-align:center;">
        {{ session('error') }}
    </div>
    @endif
    <form method="POST" action="{{ route('login.post') }}">
        @csrf
        <p class="text-primary font-italic text-center font-weight-bold">WELCOME BACK !</p>
<label>Email:</label>
<input type="email" class="form-control" name="email" placeholder="Enter your email"><br>
<label>Password:</label>
<input type="password" class="form-control" name="password" placeholder="Enter your password"><br>
<button type="submit" class="btn btn-success">Submit</button><br><br>

<span class="text-black-50">Already don`t have an account  <button href="{{Route('register.store')}}" class=" btn btn-primary btn-sm"  >Sign_Up</button> </span>
    </form>

</body>
</html>
