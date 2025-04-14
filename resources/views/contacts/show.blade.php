@extends('layouts.app')

@section('content')
<div class="container">
    <h2>{{ $contact->name }}</h2>
    <p>Role: {{ $contact->role }}</p>
    <p>Created At: {{ $contact->created_at->format('Y-m-d H:i:s') }}</p>
    <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-warning">Edit</a>
    <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
    <a href="{{ route('contacts.index') }}" class="btn btn-secondary">Back to List</a>
</div>
@endsection