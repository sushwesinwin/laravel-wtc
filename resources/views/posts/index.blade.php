@extends('layouts.app')

@section('title', 'Posts Page')

@section('content')
    <h1>Posts Page</h1>
    <a href="{{ route('posts.create') }}" class="btn btn-primary mb-5">Create New Post</a>
    
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach ($posts as $post)
            <div class="col">
                <div class="card h-100">
                    <h5 class="card-title">{{ stringLimit($post->title, 10) }} </h5>
                    <p>post by: <a href="{{ route('users.show', $post->user->id) }}">{{ $post->user->name }}</a></p>
                    <img src="{{ asset('storage/' . $post->photo) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">{{ stringLimit($post->body, 100) }}</p>
                        <p>Created post: {{ $post->created_at->diffForHumans()}}</p> 
                        {{-- diffForHumans() is a helper function that returns the time difference between the current time and the time of the post --}}
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary btn-sm me-2">Edit</a>
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div style="display: flex; justify-content: center;" class="mt-5">{{ $posts->links() }}</div>
    
@endsection

{{-- hw category hasMany Posts --}}
{{-- hw user listing when click on a user user's info page including uploaded post --}}
{{-- for ui reference smashing magazine --}}