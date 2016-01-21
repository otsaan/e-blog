<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\Tag;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{

    public function index($username)
    {
        $articles = Article::where('user_id', '=', auth()->user()->id)
            ->orderBy('created_at', 'desc')->get();

        $categories = Category::all();
        $tags = Tag::all();

        return view('articles.new')->with([
            'articles' => $articles,
            'categories' => $categories,
            'tags' => $tags
        ]);
    }

    public function create(Request $request)
    {

        $article = new \App\Article([
            'title' => $request['title'],
            'content' => $request['content'],
            'description' => $request['description'],
            'views' => 0,
            'user_id' => auth()->user()->id,
            'blog_id' => 1,
            'category_id' => $request['category'],
        ]);

        $article->save();

        $array = explode(',', $request->tags);

        foreach ($array as $tag) {
            if(filter_var($tag, FILTER_VALIDATE_INT)) {
                $article->tags()->attach($tag);
            } else {
                $newTag = Tag::create(['name' => $tag]);
                $article->tags()->attach($newTag['id']);
            }
        }


        return redirect()->route('articles', auth()->user()->username);
    }

    public function update(Request $request)
    {
        $article = Article::find($request['id']);

        $article->title = $request['title'];
        $article->content = $request['content'];
        $article->description = $request['description'];
        $article->category_id = $request['category'];
        $article->save();

        $article->tags()->detach();
        $array = explode(',', $request->tags);

        foreach ($array as $tag) {
            if(filter_var($tag, FILTER_VALIDATE_INT)) {
                $article->tags()->attach($tag);
            } else {
                $newTag = Tag::create(['name' => $tag]);
                $article->tags()->attach($newTag['id']);
            }
        }

        return redirect()->back();
    }

    public function destroy($id)
    {
        $article = Article::find($id);
        $article->delete();

        return redirect()->back();
    }

    public function show($username, $id)
    {
        $user = User::where('username','=',$username)->first();

        $article = Article::find($id);

        $tags = $article->tags;

        return view('articles.single')->with([
            'user' => $user,
            'article' => $article,
            'tags' => $tags
        ]);
    }

    public function get($id)
    {
        return Article::with('tags')->get()->find($id);
    }
}
