<?php

namespace App\Http\Controllers;

use App\Article;
use App\Blog;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class BlogController extends Controller
{

    public function index($username)
    {

        $user = User::where('username','=',$username)->first();
        $articles = Article::where('user_id','=',$user->id)->paginate(8);

        return view('articles')->with([
            'user' => $user,
            'articles' => $articles
        ]);
    }

    public function blogs($username)
    {
        $blogs = Blog::all();

        return view('admin.blogs')->with([
            'blogs' => $blogs
        ]);
    }

    public function articles($username, $id)
    {
        $blog = Blog::find($id);

        return view('admin.articles')->with([
            'articles' => $blog->articles
        ]);
    }

    public function contact($username)
    {
        $user = User::where('username','=',$username)->first();

        return view('contact')->with([
            'user' => $user,
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
}
