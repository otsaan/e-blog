<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    public function index($username) {

        if ($username == 'admin' && auth()->user()->role == 'admin') {
            return redirect('/dashboard');
        }

        if (Blog::where('username', '=', $username)->count() == 0) {
            return view('errors.404');
        }

        if ($username == 'admin' && auth()->user()->role == 'student') {
            return view('errors.404');
        }

        return view('blog');
    }
}
