<?php

namespace App\Http\Controllers;


use App\Article;
use App\Blog;
use App\Tag;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use mnshankar\CSV\CSV;

class AdminController extends Controller
{

    public function initiate()
    {
        return view('admin.initiate')->with('users',[]);
    }

    public function importCsv(Request $request)
    {
        $csvFile = $request->file('csv');

        $fileName = str_random(10) . $csvFile->getClientOriginalName();
        $csvFile->move(storage_path('uploads'), $fileName);

        $csv = new CSV();

        $arr = $csv->fromFile(storage_path('uploads/'.$fileName),true)
            ->toArray();

        $arr = collect($arr)->map(function($row, $k) use ($request){
            $row['type'] = $request->input('type');
            return $row;
        })->toArray();

        DB::table('allowed_users')->insert($arr);

        return redirect()->back()->with([
            'alert' => true,
            'class' => 'success',
            'message' => 'Le fichier à été importé vers la base données (table: <strong>allowed_users</strong>)'
        ]);
    }

    public function statistics()
    {
        $frequentTags = Tag::with('articles')
            ->get()
            ->take(10)
            ->map(function($t) {
                return [
                    'label' => $t->name,
                    'data' => $t->articles()->get()->count(),
                ];
            });

        $activeBloggers = Blog::with('articles')
            ->get()
            ->take(10)
            ->map(function($b) {
                return [
                    'username' => $b->username,
                    'articlesCount' => $b->articles()->get()->count(),
                ];
            });

        $mostVisitedBlogs = Blog::with('user')
            ->get()
            ->take(10)
            ->map(function($b){
                return [
                    'label' => $b->user['firstName'] .' '.$b->user['firstName']. ' ('.$b->username.')',
                    'data' => $b->views
                ];
            });

        $disabledBlogsCount = Blog::with('user')
            ->where('status', 'inactive')
            ->count();

        return view('admin.statistics')
            ->with([
                'frequentTags' => $frequentTags,
                'activeBloggers' => $activeBloggers,
                'mostVisitedBlogs' => $mostVisitedBlogs,
                'disabledBlogsCount' => $disabledBlogsCount,
                'studentsCount' => User::where('role','=','eleve')->get()->count(),
                'teachersCount' => User::where('role','=','prof')->get()->count(),
                'articlesCount' => Article::all()->count(),
            ]);
        }
}
