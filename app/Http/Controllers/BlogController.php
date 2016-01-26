<?php

namespace App\Http\Controllers;

use App\Article;
use App\Blog;
use App\User;
use App\Message;
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

        return view('user.articles')->with([
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

        return view('user.contact')->with([
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

    public function activate(Request $request, $id) {
        $blog = Blog::find($id);

        if($blog->status == 'active') {
            $blog->status = 'disabled';
            $blog->note = $request['note'];
            $user = $blog->user;

            Mail::send('email.deactivate', ['username'=> $blog->username, 'note' => $request->note],
              function($message) use ($user) {
                  $message->to($user['email'], $user['username'])
                      ->subject('Désactivation du blog');
            });

        } else {
            $blog->status = 'active';
        }
        $blog->save();

        return redirect()->back();
    }

    public function report(Request $request, $id) {

        $blog = Blog::find($id);

        Message::create([
            'content' => $request->note,
            'to_user_id' => $blog->user->id,
            'from_user_id' => $request->from,
            'read' => false
        ]);

        $user = $blog->user;
        $from = User::find($request->from);

        if($user->notify_email) {
            Mail::send('email.report', ['username'=> $blog->username, 'from' => $from, 'note' => $request->note],
              function($message) use ($user) {
                  $message->to($user['email'], $user['username'])
                      ->subject('Blog signalé');
            });
        }

        $url = route('blog', $blog->username);

        $note = 'Blog '. $blog->id .' signalé: (<a href="'. $url .'">'. $url . '</a>)<br>';
        $note .= $request->note;

        Message::create([
            'content' => $note,
            'to_user_id' => User::where('role','=','admin')->first()->id,
            'from_user_id' => $request->from,
            'read' => false
        ]);

        return redirect()->back();
    }
}
