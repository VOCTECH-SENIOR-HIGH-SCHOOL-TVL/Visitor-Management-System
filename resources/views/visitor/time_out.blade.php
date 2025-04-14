<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Time Out Visitor') }}
        </h2>
    </x-slot>

    <div class="container mt-5">
        <div class="card p-4">
            <form action="{{ route('visitors.timeout.submit', $visitor->id) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="time_out">Time Out:</label>
                    <input type="time" name="time_out" id="time_out" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary">Submit Time Out</button>
            </form>
        </div>
    </div>
</x-app-layout>