<?php

namespace App\Http\Controllers;

use App\Article;
use App\Blog;
use App\Category;
use App\Tag;
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
            return view('admin.index')->with($this->statistics());
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
        $user = auth()->user();

        $user->firstName = $request['firstName'];
        $user->gender = $request['gender'];
        $user->about = $request['about'];
        $user->notify_email = $request['notify_email'];
        $user->lastName = $request['lastName'];
        $user->facebook = $request['facebook'];
        $user->linkedin = $request['linkedin'];
        $user->twitter = $request['twitter'];


        if ($request->hasFile('photo')) {
            $fileName = str_random(4) .'-'. $user->username .'-'.$request->file('photo')->getClientOriginalName();
            $request->file('photo')->move(public_path('uploads'), $fileName);
            $user->photo = $fileName;
        }

        $user->save();

        return redirect()
            ->back()
            ->with([
                'alert' => true,
                'class' => 'success',
                'message' => 'Profil à été modifié avec succès.'
            ]);
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

        return [
            'frequentTags' => $frequentTags,
            'activeBloggers' => $activeBloggers,
            'mostVisitedBlogs' => $mostVisitedBlogs,
            'disabledBlogsCount' => $disabledBlogsCount,
            'studentsCount' => User::where('role','=','eleve')->get()->count(),
            'teachersCount' => User::where('role','=','prof')->get()->count(),
            'articlesCount' => Article::all()->count(),
        ];
    }
 }
