@extends('layouts.app')

@section('title', 'Users Page')

@section('content')
    <h1>Users Page</h1>
    <a href="{{ route('users.create') }}" class="btn btn-primary">Create New User</a>
    <table class="table table-striped">
        <thead class="table">
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td class="d-flex gap-2">
                    <a href="{{ route('users.show', $user->id) }}" class="btn btn-primary">Show</a>
                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

