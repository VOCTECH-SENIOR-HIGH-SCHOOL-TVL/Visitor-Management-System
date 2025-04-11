<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voctech</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Visitor Registration Form</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('visitors.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="full_name">Full Name:</label>
                <input type="text" name="full_name" id="full_name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="contact_number">Contact Number:</label>
                <input type="text" name="contact_number" id="contact_number" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="address">Address:</label>
                <textarea name="address" id="address" class="form-control" required></textarea>
            </div>

            <div class="form-group">
                <label for="who_to_meet">Who to Meet:</label>
                <input type="text" name="who_to_meet" id="who_to_meet" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="reason">Reason for Visit:</label>
                <textarea name="reason" id="reason" class="form-control" required></textarea>
            </div>

            <div class="form-group">
                <label for="time_in">Time In:</label>
                <input type="time" name="time_in" id="time_in" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="time_out">Time Out:</label>
                <input type="time" name="time_out" id="time_out" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Register Visitor</button>
        </form>
    </div>
</body>
</html>