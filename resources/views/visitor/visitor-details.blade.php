
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Visitor Details') }}
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
    </style>

    <div class="container mt-5">
        <div class="card p-4">
            <h5>Name: {{ $visitor->full_name }}</h5>
            <p>Contact Number: {{ $visitor->contact_number }}</p>
            <p>Address: {{ $visitor->address }}</p>
            <p>Who to Meet: {{ $visitor->who_to_meet }}</p>
            <p>Reason: {{ $visitor->reason }}</p>
            <p>Time In: {{ $visitor->time_in }}</p>
            <p>Time Out: {{ $visitor->time_out }}</p>
            <p>Created At: {{ $visitor->created_at }}</p>

            <form action="{{ route('visitors.timeout', $visitor->id) }}" method="POST" class="timeout-form mt-3">
                @csrf
                <button type="submit" class="btn btn-success">Time Out</button>
            </form>
        </div>
    </div>

    <!-- SweetAlert Confirmation -->
    <script>
        $(document).on('click', '.timeout-form button', function(e) {
            e.preventDefault();
            const form = $(this).closest('form');
            Swal.fire({
                title: 'Are you sure?',
                text: "This will mark the visitor as checked out.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, check out!',
                cancelButtonText: 'Cancel',
                confirmButtonColor: '#28a745',
                cancelButtonColor: '#3085d6'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    </script>
</x-app-layout>