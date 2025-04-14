<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Voctech Student') }}
        </h2>
    </x-slot>

    <div class="container mt-5">
        <form action="{{ route('voctechstudents.update', $voctechstudent->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="full_name" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="full_name" name="full_name" value="{{ $voctechstudent->full_name }}" required>
            </div>
            <div class="mb-3">
                <label for="contact_number" class="form-label">Contact Number</label>
                <input type="text" class="form-control" id="contact_number" name="contact_number" value="{{ $voctechstudent->contact_number }}" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ $voctechstudent->address }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Voctech Student</button>
            <a href="{{ route('voctechstudents.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</x-app-layout>