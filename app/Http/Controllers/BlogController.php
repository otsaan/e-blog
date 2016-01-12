<?php

namespace App\Http\Controllers;

use App\Article;
use App\Blog;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    public function index($username) {

        if ($username == 'admin' && !auth()->user()) {
            return redirect('/dashboard');
        }

        if ($username == 'admin' && auth()->user()->role == 'admin') {
            return redirect('/dashboard');
        };

        if (Blog::where('username', '=', $username)->count() == 0) {
            return view('errors.404');
        }

        if ($username == 'admin' && auth()->user()->role == 'student') {
            return view('errors.404');
        }

        $user = User::where('username','=',$username)->first();
        $articles = Article::where('user_id','=',$user->id)->paginate(2);

        return view('blog')->with([
            'user' => $user,
            'articles' => $articles
        ]);
    }

    public function blogs($username) {
        if ($username == 'admin' && auth()->user()->role == 'admin') {

            $blogs = Blog::all();

            return view('admin.blogs')->with([
                'blogs' => $blogs
            ]);
        }

        return view('errors.404');
    }

    public function articles($username, $id) {
        if ($username == 'admin' && auth()->user()->role == 'admin') {

            $blog = Blog::find($id);


            return view('admin.articles')->with([
                'articles' => $blog->articles
            ]);
        }

        return view('errors.404');
    }
}
