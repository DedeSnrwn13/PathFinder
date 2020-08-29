<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <title>Email Verifivation</title>
</head>
<body>

    <h1>Hello {{ $name }} thanks for registering!</h1>



    <h3>Please click the link to verify your registration</h3>
    {{ url('/institutions/register/activate/'. $code) }}
</body>
</html>
