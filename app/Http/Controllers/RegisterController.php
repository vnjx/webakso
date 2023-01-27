<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Notifications\WelcomeEmailNotification;


class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            'title' => 'Register',
            'active' => 'register'
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' => ['required', 'min:3', 'max:255', 'unique:users'], 
            'address' => ['required', 'max:255', 'unique:users'], 
            'email' => 'required|email:dns|unique:users',
            'password' => 'required_with:password_confirmation|confirmed|min:5|max:12',
            'password_confirmation' => 'required|min:5|max:12',
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);
  
        User::create($validatedData);
        $request->session()->flash('success', 'Registrasi Berhasil! Silahkan Login');
        return redirect('/login');
    }

    public function create(array $validatedData)
    {
        $user = User::create([
            'name' => $validatedData['name'],
            'username' => $validatedData['username'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        $user->notify(new WelcomeEmailNotification($user));
            
        return $user;
    }
}
