<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Tag;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function statistics()
    {
        $frequentTags = Tag::with('articles')->get()->map(function($t) {
            return [
                'name' => $t->name,
                'articlesCount' => $t->articles()->get()->count()
            ];
        })->sortByDesc('articlesCount')->take(10);

        $activeBloggers = Blog::with('articles')
            ->with('user')
            ->get()
            ->map(function($b) {
                return [
                    'username' => $b->username,
                    'articlesCount' => $b->articles()->get()->count(),
                    'user' => $b->user()->get()
                ];
            })->sortByDesc('articlesCount')->take(10);

        $mostVisitedBlogs = Blog::with('user')
            ->get()
            ->sortByDesc('views')
            ->take(10);


        return view('admin.statistics')
            ->with(dd([
                'frequentTags' => $frequentTags,
                'activeBloggers' => $activeBloggers,
                'mostVisitedBlogs' => $mostVisitedBlogs
            ]));
    }
}
