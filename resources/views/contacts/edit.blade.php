<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Contact</title>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons (optional) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background-color: #f9fafb;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .container {
            max-width: 600px;
        }

        .card {
            border: none;
            border-radius: 1rem;
            box-shadow: 0 8px 30px rgba(0,0,0,0.05);
        }

        .form-label {
            font-weight: 600;
        }

        .btn {
            min-width: 120px;
        }

        .btn-primary {
            background-color: #4f46e5;
            border-color: #4f46e5;
        }

        .btn-secondary {
            background-color: #e5e7eb;
            border: none;
            color: #111827;
        }

        .form-control {
            border-radius: 0.5rem;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4 text-center">Edit Contact</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card p-4">
            <form action="{{ route('contacts.update', $contact->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group mb-3">
                    <label for="name" class="form-label">Full Name</label>
                    <input 
                        type="text" 
                        class="form-control" 
                        name="name" 
                        id="name" 
                        value="{{ old('name', $contact->name) }}" 
                        required
                    >
                </div>

                <div class="form-group mb-3">
                    <label for="role" class="form-label">Role / Position</label>
                    <input 
                        type="text" 
                        class="form-control" 
                        name="role" 
                        id="role" 
                        value="{{ old('role', $contact->role) }}" 
                        required
                    >
                </div>

                <div class="d-flex justify-content-end gap-2 mt-4">
                    <a href="{{ route('contacts.index') }}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Optional: Bootstrap JS if needed -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
