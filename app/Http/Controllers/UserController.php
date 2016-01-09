<?php

namespace App\Http\Controllers;

use App\Blog;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{

    public function profile($username) {

        if (Blog::where('username', '=', $username)->count() == 0) {
            return view('errors.404');
        }

        return view('profile');
    }


    public function dashboard($username) {

        if ($username == 'admin' && auth()->user()->role == 'admin') {

            $students = User::with('blog')->where('role','=','student')->get();

            return view('admin.index')->with([
                'students' => $students
            ]);
        }

        if (Blog::where('username', '=', $username)->count() == 0) {
            return view('errors.404');
        }


        return view('index');
    }
 }
