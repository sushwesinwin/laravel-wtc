@extends('layouts.app')

@section('title', 'Todos Page');

@section('content')
    <h1>To do Page</h1>
    <a href="{{ route('todos.create') }}" class="btn btn-primary">Create New Todo</a>
   @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
   @endif
    <table class="table">
        <thead class="table-dark">
            <tr class="text-center">
        <thead class="table-dark">
            <tr class="text-center">
                <th class="text-center">Task</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($todos as $todo)
            <tr>
                <td>{{ $todo->name }}</td>
                <td>{{ $todo->completed  ? 'Completed' : 'Pending' }}</td>
                <td class="d-flex gap-2">
                    <form action="{{ route('todos.destroy', $todo->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    <a href="{{ route('todos.edit', $todo->id) }}" class="btn btn-warning">Edit</a>
                </td>
            </tr>
                
            @endforeach
        </tbody>
    </table>
@endsection 