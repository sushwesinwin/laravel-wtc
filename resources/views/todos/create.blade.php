@extends('layouts.app')

@section('title', 'About Page');

@section('content')
    <h1>Create Todo</h1>
    {{-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        
    @endif --}}

    <form action="{{ route('todos.store')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Todo Name</label>
            <input type="text" value="{{ old('name') }}" class="form-control" id="name" name="name" >
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <input type="checkbox" name="completed" id="completed" value="1">
        <label for="completed" class="mb-2">Completed</label>
        <br>
        <button type="submit" class="btn btn-primary">Create Todo</button>
    </form>
@endsection 