<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index(){
        return view('register');
    }

    public function store(Request $request)
    {
        $ValidatedData=$request->validate([
            "name" => "required|unique:users",
            "email" => "required|unique:users",
            "password" => "required|min:5"
        ]);

        $ValidatedData['password'] = bcrypt($ValidatedData['password']);
        User::create($ValidatedData);
        return redirect('/login');
    }
}
