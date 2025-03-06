@extends('layouts.app')

@section('title', 'Create Todo')

@section('content')
    <h1>Update Todo</h1>
    {{-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}

    <form action="{{ route('todos.update', $todo->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Task Name</label>
            <input type="text" value="{{ old('name', $todo->name) }}" class="form-control" id="name" name="name"
                required>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Completed</label>
            <input type="checkbox" {{ $todo->completed === 1 ? 'checked' : '' }} class="form-check-input" id="completed"
                name="completed" value="1">
        </div>
        <button type="submit" class="btn btn-primary">Update Todo</button>
    </form>
@endsection