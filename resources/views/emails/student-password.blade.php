<!DOCTYPE html>
<html>
<head>
    <title>Your Account Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    <p>Your student account has been created successfully.</p>
    <p><strong>Login Email:</strong> {{ $email }}</p>
    <p><strong>Temporary Password:</strong> {{ $password }}</p>
    <p>Please login and change your password immediately.</p>
    <br>
    <p class="btn btn-primary"><a href="{{ route('login.post') }}">Click here to log in</a></p>
    <p>Thank you,</p>
    <p>The Attendance System Team</p>

</body>
</html>
