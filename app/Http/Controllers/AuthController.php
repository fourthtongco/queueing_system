<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //

    public function showLogin()
    {
        return view('welcome');
    }
    public function showRegister()
    {
        $departments = Department::where('status', true)->get();
    return view('admin.register', compact('departments'));
    }

    public function register(Request $request){
        $values = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'department_id' => 'required|exists:departments,id',
        ]);
    }
}
