<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; //built in request
use Illuminate\Support\Facades\DB;
use App\Models\Todo;

class TodoController extends Controller
{
    public function index()
    {
        $all = Todo::all(); //eloquent orm
        //$all = DB::table('todo')->get(); //raw sql
        return view('todos.index', ['todos' => $all]);
    }

    public function create()
    {
        return view('todos.create'); // Create a new view for the create form
    }

    public function store(Request $request)
    {
        // return $request->all();
        $request->validate([
            'name' => 'required|string|max:255|min:8',
            'completed' => 'boolean',
        ]);
        Todo::create($request->all()); //eloquent orm (model)
        // $todo = new Todo();
        // $todo->name = $request->name;
        // $todo->completed = $request->completed ? true : false;
        // $todo->save();
        return redirect()->route('todos.index')->with('success', 'Todo created successfully'); //with session key-value
    }
}
