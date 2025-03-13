@extends('layouts.app')

@section('title', 'Todos Page')

@section('content')
    <h1>To do Page</h1>
    <a href="{{ route('todos.create') }}" class="btn btn-primary">Create New Todo</a>
   @if (session('success'))
   <div class="alert alert-warning alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
    
   @endif
    <table class="table table-striped">
        <thead class="table">
            <tr>
                <th>No</th>
                <th>Task</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            {{ $todos->firstItem() }}
            {{ $todos->lastItem() }}
            @foreach ($todos as $id => $todo)
            <tr>
                {{-- <td>{{ ($todos->currentPage() - 1) * $todos->perPage() + $loop->iteration }}</td> --}}
                <td>{{ $todos->firstItem() + $loop->index }}</td>
                <td>{{ $todo->name }}</td>
                <td>{{ $todo->completed  ? 'Completed' : 'Pending' }}</td>
                <td class="d-flex gap-2">
                    <form action="{{ route('todos.destroy', $todo->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                    <a href="{{ route('todos.edit', $todo->id) }}" class="btn btn-warning">Edit</a>
                </td>
            </tr>
                
            @endforeach
            
            
        </tbody>
    </table>
    {{-- <div style="display: flex; justify-content: center;" class="mt-5">{{ $todos->links() }}</div> --}}
@endsection 