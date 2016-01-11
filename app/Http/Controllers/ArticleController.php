<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function index($username) {

        if ($username == 'admin' && !auth()->user()) {
            return redirect('/dashboard');
        }

        if ($username == 'admin' && auth()->user()->role == 'admin') {
            return redirect('/dashboard');
        };

        if ($username == 'admin' && auth()->user()->role == 'student') {
            return view('errors.404');
        }

        $articles = Article::where('user_id', '=', auth()->user()->id)
            ->orderBy('created_at', 'desc')
            ->take(3)->get();

        return view('articles.new')->with([
            'articles' => $articles
        ]);

    }

    public function create(Request $request)
    {
        Article::create([
            'title' => $request['title'],
            'content' => $request['content'],
            'views' => 0,
            'user_id' => auth()->user()->id,
            'blog_id' => 1,
            'category_id' => 1,
        ]);

        return redirect()->route('articles', auth()->user()->username);
    }
}
