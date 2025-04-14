    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Voctech Student Visitor List') }}
            </h2>
        </x-slot>

        <div class="container mt-5">
            <div class="d-flex justify-content-between mb-3">
                <a href="{{ route('voctechstudents.create') }}" class="btn btn-primary rounded-pill px-4 shadow-sm">+ Add Voctech Student</a>
            </div>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="card p-4">
                <div class="table-responsive">
                    <table class="table table-hover table-striped align-middle" id="voctechstudentsTable">
                        <thead class="table-light">
                            <tr>
                                <th>Name</th>
                                <th>Contact Number</th>
                                <th>Address</th>
                                <th>Visitor Count</th>
                                <th>Last Visitor</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($voctechstudents as $voctechstudent)
                                <tr>
                                    <td>{{ $voctechstudent->full_name }}</td>
                                    <td>{{ $voctechstudent->contact_number }}</td>
                                    <td>{{ $voctechstudent->address }}</td>
                                    <td>{{ $voctechstudent->visits_count }}</td>
                                    <td>{{ $voctechstudent->last_visitor }}</td>
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center align-items-center gap-2">
                                            <a href="{{ route('voctechstudents.edit', $voctechstudent->id) }}" class="btn btn-warning btn-sm btn-icon text-white" title="Edit">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <form action="{{ route('voctechstudents.destroy', $voctechstudent->id) }}" method="POST" class="delete-form m-0 p-0">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm btn-icon" title="Delete">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                            <form action="{{ route('voctechstudents.visit', $voctechstudent->id) }}" method="POST" class="m-0 p-0">
                                                @csrf
                                                <input type="hidden" name="last_visitor" value="{{ $voctechstudent->who_to_meet }}">
                                                <button type="submit" class="btn btn-info btn-sm btn-icon" title="Record Visit">
                                                    <i class="bi bi-check-circle"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $voctechstudents->links() }}
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
                $('#voctechstudentsTable').DataTable();
            });
        </script>

        <!-- Bootstrap Icons -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    </x-app-layout>