<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
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

        return view('admin.initiate')->with([
            'users' => $arr
        ]);
    }
}
