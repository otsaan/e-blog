<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Http\Requests;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function index()
    {
        return view('home')
            ->with(['users'=> User::where('role','!=','admin')
                ->get()
                ->take(20)
                ->map(function($u) {
                    $u->fullName = $u->firstName . ' ' . $u->lastName;
                    $u->blogUrl = url('/') . '/' . $u->username;
                    return $u;
                })
            ]);
    }

    public function notFound()
    {
        return view('errors.404');
    }

    public function disabled($username)
    {
        $blog = Blog::where('username', '=', $username)->first();

        return view('errors.disabled')->with([
            'username' => $username,
            'blog' => $blog
        ]);
    }

    public function dashboard()
    {
        return redirect()->route('dashboard', auth()->user()->username);
    }

    public function artisan(Request $request)
    {

        $command = $request->input('command');

        if ($command == 'migrate') {
            Artisan::call('migrate');
        } elseif ($command == 'db:seed') {
            Artisan::call('db:seed');
        } elseif ($command == 'migrate:refresh') {
            Artisan::call('migrate:refresh');
        } else {
            return view('errors.404');
        }

        return 'php artisan '. $command;
    }
}
