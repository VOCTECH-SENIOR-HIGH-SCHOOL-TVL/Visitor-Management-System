<x-app-layout>
<x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Visitor List') }}
            </h2>
        </x-slot>
    <style>
        body {
            background-color: #f9fafb;
        }
        .card {
            border: none;
            border-radius: 1rem;
            box-shadow: 0 4px 20px rgba(0,0,0,0.05);
        }
        .btn-icon {
            width: 35px;
            height: 35px;
            padding: 0;
            border-radius: 0.5rem;
        }
        .table td, .table th {
            vertical-align: middle;
        }
        .action-buttons .btn {
            margin-right: 5px;
        }
    </style>
<body>
<div class="container mt-5">
    <div class="d-flex justify-content-between mb-3">

        <a href="{{ route('visitors.create') }}" class="btn btn-primary rounded-pill px-4 shadow-sm">+ Add Pre-register</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card p-4">
        <div class="table-responsive">
            <table class="table table-hover table-striped align-middle" id="visitorsTable">
                <thead class="table-light">
                    <tr>
                        <th>Name</th>
                        <th>Contact Number</th>
                        <th>Address</th>
                        <th>Who to Meet</th>
                        <th>Reason</th>
                        <th>Time In</th>
                        <th>Time Out</th>
                        <th>Created At</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
    @foreach($visitors as $visitor)
        <tr>
            <td>{{ $visitor->full_name }}</td>
            <td>{{ $visitor->contact_number }}</td>
            <td>{{ $visitor->address }}</td>
            <td>
                @if($visitor->contact)
                    {{ $visitor->contact->name }} ({{ $visitor->contact->role }})
                @else
                    N/A
                @endif
            </td>
            <td>{{ $visitor->reason }}</td>
            <td>{{ $visitor->time_in }}</td>
            <td>{{ $visitor->time_out }}</td>
            <td>{{ $visitor->created_at }}</td>
            <td class="text-center">
                <div class="d-flex justify-content-center align-items-center gap-2">
                    <a href="{{ route('visitors.edit', $visitor->id) }}" class="btn btn-warning btn-sm btn-icon text-white" title="Edit">
                        <i class="bi bi-pencil"></i>
                    </a>
                    <a href="{{ route('visitors.timeout', $visitor->id) }}" class="btn btn-info btn-sm btn-icon text-white" title="Time Out">
                        <i class="bi bi-clock"></i>
                    </a>
                    <form action="{{ route('visitors.destroy', $visitor->id) }}" method="POST" class="delete-form m-0 p-0">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm btn-icon" title="Delete">
                            <i class="bi bi-trash"></i>
                        </button>
                    </form>
                </div>
            </td>
        </tr>
    @endforeach
</tbody>
            </table>
        </div>
        {{ $visitors->links() }}
    </div>
</div>

<!-- SweetAlert Delete Confirmation -->
<script>
    $(document).on('click', '.delete-form button', function(e) {
        e.preventDefault();
        const form = $(this).closest('form');
        Swal.fire({
            title: 'Are you sure?',
            text: "This action cannot be undone.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel',
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    });

    $(document).ready(function () {
        $('#visitorsTable').DataTable();
    });
</script>

<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

</x-app-layout>