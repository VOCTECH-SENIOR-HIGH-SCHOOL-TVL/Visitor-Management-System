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
        <h1>Edit Visitor</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('visitors.update', $visitor->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="full_name">Full Name:</label>
                <input type="text" name="full_name" id="full_name" class="form-control" value="{{ old('full_name', $visitor->full_name) }}" required>
            </div>

            <div class="form-group">
                <label for="contact_number">Contact Number:</label>
                <input type="text" name="contact_number" id="contact_number" class="form-control" value="{{ old('contact_number', $visitor->contact_number) }}" required>
            </div>

            <div class="form-group">
                <label for="address">Address:</label>
                <textarea name="address" id="address" class="form-control" required>{{ old('address', $visitor->address) }}</textarea>
            </div>

            <div class="form-group">
                <label for="who_to_meet">Who to Meet:</label>
                <input type="text" name="who_to_meet" id="who_to_meet" class="form-control" value="{{ old('who_to_meet', $visitor->who_to_meet) }}" required>
            </div>

            <div class="form-group">
                <label for="reason">Reason for Visit:</label>
                <textarea name="reason" id="reason" class="form-control" required>{{ old('reason', $visitor->reason) }}</textarea>
            </div>

            <div class="form-group">
                <label for="time_in">Time In:</label>
                <input type="time" name="time_in" id="time_in" class="form-control" value="{{ old('time_in', $visitor->time_in) }}" required>
            </div>

            <div class="form-group">
                <label for="time_out">Time Out:</label>
                <input type="time" name="time_out" id="time_out" class="form-control" value="{{ old('time_out', $visitor->time_out) }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update Visitor</button>
        </form>
    </div>
</body>
</html>