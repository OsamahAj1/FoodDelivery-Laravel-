<?php

namespace App\Http\Controllers\restaurant;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create()
    {
        return view('restaurant.register');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => ['required', 'max:255', 'unique:users,name'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'address' => ['required', 'min:20', 'max:255'],
            'des' => ['required', 'min:10', 'max:255'],
            'password' => ['required', 'min:8', 'max:255'],
            'image' => ['required', 'image'],
        ]);

        $attributes['rule'] = 'restaurant';

        $user = User::create($attributes);

        auth()->login($user);

        return redirect(route('restaurant.index'))->with('message', 'Registered Successfully');
    }
}
