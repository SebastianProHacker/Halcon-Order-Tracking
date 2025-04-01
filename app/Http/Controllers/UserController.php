<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Department;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        // Regresa user.index view
        return view('users.index', compact('users')); 
    }

    public function create()
    {
        $departments = Department::all();
        // Regresa users.create view
        return view('users.create', compact('departments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'department_id' => 'required|exists:departments,id'
        ]);

        User::create($request->all());
        return redirect()->route('users.index');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $departments = Department::all();
        // Regresa users.edit view
        return view('users.edit', compact('user', 'departments')); 
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());
        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->status = 'inactive';
        $user->save();
        return redirect()->route('users.index');
    }
}