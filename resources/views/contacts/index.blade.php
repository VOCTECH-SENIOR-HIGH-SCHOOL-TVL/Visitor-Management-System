<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Registered Contacts') }}
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

    <div class="container mt-5">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
       <div class="mb-3">
            <a href="{{ route('contacts.create') }}" class="btn btn-primary rounded-pill px-4 shadow-sm">+ Add Contact</a>
        </div>
        <div class="card p-4">
            <div class="table-responsive">
            <table id="contactsTable" class="table table-hover table-striped align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Name</th>
                            <th>Role</th>
                            <th>Created At</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="contactTableBody">
                        @foreach($contacts as $contact)
                            <tr>
                                <td><a href="{{ route('contacts.show', $contact->id) }}">{{ $contact->name }}</a></td>
                                <td>{{ $contact->role }}</td>
                                <td>{{ $contact->created_at->format('Y-m-d H:i:s') }}</td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center align-items-center gap-2">
                                        <!-- Edit Button -->
                                        <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-warning btn-sm btn-icon text-white" title="Edit">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <!-- Delete Button -->
                                        <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" class="delete-form m-0 p-0">
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
        </div>

        <!-- Pagination Links -->
        <div class="mt-3">
            {{ $contacts->links() }}
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
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });

        // Search functionality
        $('#search').on('keyup', function() {
            var value = $(this).val().toLowerCase();
            $('#contactTableBody tr').filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
            });
        });
        $(document).ready(function () {
        $('#contactsTable').DataTable({
            "columnDefs": [
                { "orderable": false, "targets": 3 } // Disable sorting on the 'Actions' column
            ],
            "language": {
                search: "_INPUT_",
                searchPlaceholder: "Search..."
            }
        });
    });
    </script>
    <!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" />

<!-- jQuery (required by DataTables) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</x-app-layout>