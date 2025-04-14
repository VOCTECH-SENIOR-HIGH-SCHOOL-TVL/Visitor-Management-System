<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Visitor</title>

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
            max-width: 700px;
        }

        .card {
            border: none;
            border-radius: 1rem;
            box-shadow: 0 8px 30px rgba(0,0,0,0.05);
        }

        .form-label {
            font-weight: 600;
        }

        .form-control {
            border-radius: 0.5rem;
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
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4 text-center">Edit Visitor</h2>

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
            <form action="{{ route('visitors.update', $visitor->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group mb-3">
                    <label for="full_name" class="form-label">Full Name</label>
                    <input 
                        type="text" 
                        name="full_name" 
                        id="full_name" 
                        class="form-control" 
                        value="{{ old('full_name', $visitor->full_name) }}" 
                        required
                    >
                </div>

                <div class="form-group mb-3">
                    <label for="contact_number" class="form-label">Contact Number</label>
                    <input 
                        type="text" 
                        name="contact_number" 
                        id="contact_number" 
                        class="form-control" 
                        value="{{ old('contact_number', $visitor->contact_number) }}" 
                        required
                    >
                </div>

                <div class="form-group mb-3">
                    <label for="address" class="form-label">Address</label>
                    <textarea 
                        name="address" 
                        id="address" 
                        class="form-control" 
                        required
                    >{{ old('address', $visitor->address) }}</textarea>
                </div>

                <div class="form-group mb-3">
                    <label for="who_to_meet" class="form-label">Who to Meet</label>
                    <input 
                        type="text" 
                        name="who_to_meet" 
                        id="who_to_meet" 
                        class="form-control" 
                        value="{{ old('who_to_meet', $visitor->who_to_meet) }}" 
                        required
                    >
                </div>

                <div class="form-group mb-3">
                    <label for="reason" class="form-label">Reason for Visit</label>
                    <textarea 
                        name="reason" 
                        id="reason" 
                        class="form-control" 
                        required
                    >{{ old('reason', $visitor->reason) }}</textarea>
                </div>

                <div class="form-group mb-3">
                    <label for="time_in" class="form-label">Time In</label>
                    <input 
                        type="time" 
                        name="time_in" 
                        id="time_in" 
                        class="form-control" 
                        value="{{ old('time_in', $visitor->time_in) }}" 
                        required
                    >
                </div>

                <div class="form-group mb-4">
                    <label for="time_out" class="form-label">Time Out</label>
                    <input 
                        type="time" 
                        name="time_out" 
                        id="time_out" 
                        class="form-control" 
                        value="{{ old('time_out', $visitor->time_out) }}" 
                        required
                    >
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('visitors.index') }}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">Update Visitor</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Optional Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
