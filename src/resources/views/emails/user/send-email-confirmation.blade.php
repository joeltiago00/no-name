<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Send Email Confirmation</title>
</head>
<body>
    <h2>Hello {{ucfirst($user['first_name'])}},</h2>

    <p>Here is the code to confirm your email: <strong>{{$code}}</strong></p>
</body>
</html>
