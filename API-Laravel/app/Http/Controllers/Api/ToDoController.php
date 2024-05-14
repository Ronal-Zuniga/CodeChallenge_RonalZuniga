<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ToDo;

class ToDoController extends Controller
{
    
    public function index()
    {
        $to_dos = ToDo::all();
        return $to_dos;
    }

    public function store(Request $request)
    {
        $to_do = new ToDo();
        $to_do->description = $request->description;
        $to_do->completed = $request->completed;
        $to_do->save();
    }

    public function show(string $id)
    {
        $to_do = ToDo::findOrFail($id);
        return $to_do;
    }

    public function update(Request $request, string $id)
    {
        
    }

    public function destroy(string $id)
    {
        
    }

    public function toggleCompleted(string $id)
    {
        $to_do = ToDo::findOrFail($id);
        $to_do->completed = !$to_do->completed;
        $to_do->save();
        return $to_do;
    }

    public function destroyCompleted()
    {
        $to_do = ToDo::where('completed', true)->delete();
        return $to_do;
    }

    public function destroyAll()
    {
        $to_do = ToDo::truncate();
        return $to_do;
    }
}


