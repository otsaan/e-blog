<?php

namespace App\Http\Controllers;


use App\Blog;
use App\Tag;
use App\Http\Requests;
use App\Http\Controllers\Controller;

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
