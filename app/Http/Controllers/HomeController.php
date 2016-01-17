<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
        return view('home');
    }

    public function dashboard() {
        if (!Auth::user()) {
            return redirect('/');
        }

        return redirect()->route('dashboard', auth()->user()->username);
    }

    public function getUsers() {
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
