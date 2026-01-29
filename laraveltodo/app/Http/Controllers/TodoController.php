<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

use function Pest\Laravel\delete;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $todos = Todo::all();
        return view('todos.index', compact('todos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
           'title' => 'required',            
           'desc' => 'required',
           'due' => 'required',
        ]);
        Todo::create($validated);
        return redirect() -> route('todos.index') -> with('success', 'created succesfully');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $todo = Todo::findOrFail($id);
        $validated = $request->validate([
            'title' => 'required',            
           'desc' => 'required',
           'due' => 'required',
        ]);
        $todo -> update($validated);
        return redirect() -> route('todos.index') -> with('success', 'updated succesfully');
    }

    /**
     * Marks as completed
     */
    public function complete($id)
    {
        $todo = Todo::findOrFail($id);
        $todo -> update(['is_completed' => true]);

        return redirect() -> route('todos.index') -> with('success', 'marked as completed');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $todo = Todo::findOrFail($id);
        $todo -> delete();

        return redirect() -> route('todos.index') -> with('success', 'Deletd succesfully');
    }
}
