<?php

namespace App\Http\Controllers;

use App\Http\Requests;
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
}
