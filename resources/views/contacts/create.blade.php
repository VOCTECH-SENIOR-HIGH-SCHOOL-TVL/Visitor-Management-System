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
        <h1>Contact Registration Form</h1>

        {{-- Display Validation Errors --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('contacts.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Name:</label>
                <input 
                    type="text" 
                    name="name" 
                    id="name" 
                    class="form-control" 
                    value="{{ old('name') }}" 
                    required
                >
            </div>

            <div class="form-group">
                <label for="role">Role:</label>
                <input 
                    type="text" 
                    name="role" 
                    id="role" 
                    class="form-control" 
                    value="{{ old('role') }}" 
                    required
                >
            </div>

            <button type="submit" class="btn btn-primary">Register Contact</button>
        </form>
    </div>
</body>
</html>
