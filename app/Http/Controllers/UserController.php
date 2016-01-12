<?php

namespace App\Http\Controllers;

use App\Article;
use App\Blog;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

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

        $articles = Article::where('user_id', '=', auth()->user()->id)->get();

        return view('index')->with([
            'articles' => $articles
        ]);
    }

    public function sendEmail($username, Request $request)
    {
        $user = User::where('username','=',$username)->first();

        Mail::raw($request->message, function ($m) use ($user, $request) {
            $m->from($request->email, $request->name);

            $m->to($user->email, $user->name)->subject($request->subject);
        });

        return redirect()->back();
    }

    public function update(Request $request) {
        $user = User::find($request['id']);
        $user->firstName = $request['firstName'];
        $user->about = $request['about'];
        $user->lastName = $request['lastName'];
        $user->facebook = $request['facebook'];
        $user->linkedin = $request['linkedin'];
        $user->twitter = $request['twitter'];
        $user->save();
        return redirect()->back();
    }
 }
