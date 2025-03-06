@extends('layouts.app')

@section('title', 'Post Page')

@section('content')
    <h1>Post Page</h1>
    <ul>
        @foreach ($categories as $category)
            <li>{{ $category }}</li>
        @endforeach
    </ul>
    <ul>
        @foreach ($posts as $post)
            @php
                echo '<pre>';
                print_r($post);
            @endphp
            {{$post[0]}}
            @foreach ($post as $item)
                <li>{{ $item }}</li>
            @endforeach
        @endforeach
    </ul>
@endsection 