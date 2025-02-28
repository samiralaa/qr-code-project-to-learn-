<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container text-center mt-5">
        <h1>Welcome to QR Code Generator For Webenia</h1>
        <p class="mt-3">Click the button below to generate your personalized QR Code.</p>
        <a href="{{ route('generate.qrcode.form') }}" class="btn btn-primary btn-lg mt-3">Generate QR Code</a>
    </div>
</body>

</html>