<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    //
    public function index()
    {
        return Todo::all();
    }

    public function store(Request $request)
    {
        return Todo::create($request->only('title'));
    }

    public function update(Request $request, Todo $todo)
    {
        $todo->update($request->only('title', 'done'));

        return $todo;
    }

    public function destroy(Todo $todo)
    {
        $todo->delete();

        return response()->noContent();
    }
}
