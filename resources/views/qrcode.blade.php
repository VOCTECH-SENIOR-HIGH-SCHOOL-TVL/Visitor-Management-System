<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="card mt-5">
            <div class="card-header"><h4>Laravel QR Code Example</h4></div>
            <div class="card-body">
                <!-- Generate QR Code that links to a YouTube video -->
                {!! QrCode::size(100)->generate('https://www.youtube.com'); !!}
            </div>
        </div>
    </div>
</body>
</html>