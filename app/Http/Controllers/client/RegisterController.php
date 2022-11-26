<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create()
    {
        return view('client.register');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'number' => ['required', 'regex:/^((?:[+?0?0?966]+)(?:\s?\d{2})(?:\s?\d{7}))$/'],
            'address' => ['required', 'min:20', 'max:255'],
            'password' => ['required', 'min:8', 'max:255'],
            'image' => ['nullable' ,'image'],
        ]);

        if (isset($attributes['image'])) {
            $attributes['image'] = request()->file('image')->store('images');
        } else {
            unset($attributes['image']);
        }

        $attributes['rule'] = 'client';

        $user = User::create($attributes);

        auth()->login($user);

        return redirect(route('client.index'))->with('message', 'Registered Successfully');
    }
}
