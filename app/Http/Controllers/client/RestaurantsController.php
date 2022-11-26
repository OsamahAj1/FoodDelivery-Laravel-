<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RestaurantsController extends Controller
{
    public function index()
    {
        return view('client.index', [
            'restaurants' => User::latest()
                ->where('rule', 'restaurant')
                ->paginate(),
        ]);
    }

    public function show(User $user)
    {
        if ($user->rule !== 'restaurant') {
            abort(404);
        }

        return view('client.restaurant', [
            'restaurant' => $user,
        ]);
    }
}
