<?php

namespace App\Http\Controllers\delivery;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create()
    {
        return view('delivery.register');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'number' => ['required', 'regex:/^((?:[+?0?0?966]+)(?:\s?\d{2})(?:\s?\d{7}))$/'],
            'car' => ['required', 'min:3', 'max:255'],
            'password' => ['required', 'min:8', 'max:255'],
            'image' => ['required', 'image'],
        ]);

        $attributes['rule'] = 'delivery';
        $attributes['image'] = request()->file('image')->store('images');

        $user = User::create($attributes);

        auth()->login($user);

        return redirect(route('delivery.index'))->with('message', 'Registered Successfully');
    }
}
