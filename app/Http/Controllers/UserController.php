<?php

namespace App\Http\Controllers;

use App\Article;
use App\Blog;
use App\Category;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    /**
     * Redirect to dashboard (user & admin)
     * @param $username
     * @return $this
     */
    public function dashboard($username)
    {
        if ($username == 'admin') {
            $users = User::with('blog')->where('role','=','user')->get();

            return view('admin.index')->with([
                'users' => $users
            ]);
        }

        $articles = Article::where('user_id', '=', auth()->user()->id)->get();

        $blogViews = auth()->user()->blog->views;
        $categoriesCount = Category::all()->count();

        return view('user.index')->with([
            'articles' => $articles,
            'blogViews' => $blogViews,
            'categoriesCount' => $categoriesCount
        ]);
    }

    /**
     * Update user
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
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

    /**
     * User registration : Handle confirmation code
     * @param $confirmationCode
     * @return \Illuminate\Http\RedirectResponse
     */
    public function confirm($confirmationCode)
    {
        if(!$confirmationCode) {
            return redirect('/register')
                ->with([
                    'alert' => true,
                    'class' => 'alert-danger',
                    'message' =>  'Code de confirmation invalid.'
                ]);
        }

        $user = User::where('confirmation_code', $confirmationCode)->first();

        if (!$user) {
            return redirect('/register')
                ->with([
                    'alert' => true,
                    'class' => 'alert-danger',
                    'message' => 'Aucun utilisateur avec ce code de confirmation.'
                ]);
        }

        $user->confirmed = 1;
        $user->confirmation_code = null;

        $user->save();

        $user->blog()->create([
            'username' => $user->username,
            'status' => 'active'
        ]);

        Auth::login($user);

        return redirect()->route('dashboard', Auth::user()->username)
            ->with([
                'notif' => true,
                'type' => 'success',
                'position' => 'top right',
                'title' => 'Compte validé',
                'body' => 'Vous pouvez désormais utiliser votre compte normalement.'
            ]);
    }

    /**
     * User profile
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function profile() {
        return view('user.profile');
    }
 }
