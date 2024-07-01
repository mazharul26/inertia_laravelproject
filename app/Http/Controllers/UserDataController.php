<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserDataController extends Controller
{
    public function index()
    {
        $usersList = User::orderBy('id', 'desc')
                        ->paginate(6);
  
        return Inertia::render('UserView', [
            'usersList' => $usersList
        ]);
    }
}
