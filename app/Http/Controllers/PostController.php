<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::paginate(5);
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $users = User::all();
        return view('posts.create', compact('categories', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $new = $request->validated();
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public'); // storage->public->(custom-folderName)
            $new['photo'] = $photoPath;
        }
        Post::create($new);
        return redirect()->route('posts.index')->with('success', 'Post created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        $users = User::all();
        return view('posts.edit', compact('post', 'categories', 'users'));
    }
    public function update(UpdatePostRequest $request, Post $post)
    {
        $new = $request->validated();
        if ($request->hasFile('photo')) {
            // Delete old photo
            Storage::disk('public')->delete($post->photo);

            // Upload new photo
            $photoPath = $request->file('photo')->store('photos', 'public');
            $new['photo'] = $photoPath;
        }
        $post->update($new);
        return redirect()->route('posts.index')->with('success', 'Post updated successfully');
    }

    /**
     * Update the specified resource in storage.
     */
   

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully');
    }
}
