<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function index()
    {
        return view('home');
    }

    public function notFound()
    {
        return view('errors.404');
    }

    public function disabled()
    {
        return view('errors.disabled');
    }

    public function dashboard()
    {
        return redirect()->route('dashboard', auth()->user()->username);
    }

    public function getUsers()
    {
        return User::where('role','user')
            ->get()
            ->map(function($u) {
                $u->photo = asset('images/'.$u->photo);
                $u->fullName = $u->firstName . ' ' . $u->lastName;
                $u->blogUrl = url('/') . '/' . $u->username;
                return $u;
            });

    }
}
