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
innput{
    display: block;

    width: 93.5%;
    padding: 10px;
    margin: 10px 0;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
    color: #333;
    line-height: 1.5;


}
button{
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}
P{
    text-align: center;
    font-size: 24px;
    margin-bottom: 20px;
    color:blue;
    font-weight:700;

}
label{
    font-weight: 900;
}
</style>
</head>
<body>
    <form method="post" action="{{route('register.store')}}">
        @csrf

        <p>REGISTER FORM</p>
<label>User name:</label>
<input class="form-control" type="text" name="name" placeholder="Enter your user name"><br>
<label>Email:</label>
<input class="form-control" type="text" name="email" placeholder="Enter your email"><br>
<label>Password:</label>
<input class="form-control" type="password" name="password" placeholder="Enter your password"><br>
<label>Password confirm:</label>
<input class="form-control" type="password" name="password_confirm" placeholder="Re-Enter your password"><br>
<button type="submit">Submit</button>
    </form>

</body>
</html>
