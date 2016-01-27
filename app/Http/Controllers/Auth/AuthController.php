<?php

namespace App\Http\Controllers\Auth;

use App\Blog;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|max:255|alpha_num',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $confirmationCode = str_random(30);

        $user = User::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'role' => $data['type'],
            'confirmation_code' => $confirmationCode
        ]);

        Mail::send('email.verify', ['confirmationCode'=> $confirmationCode], function($message) use ($data) {
            $message->to($data['email'], $data['username'])
                ->subject('Confirmation de compte');
        });
    }

    public function register(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        // check if user is in allowed_users table
        $email = $request->input('email');
        $type = $request->input('type');

        $query = DB::table('allowed_users')
            ->where('email', $email);

        if ($type == 'eleve') {
            $cne = $request->input('cne');
            $query = $query->where('type', 'eleve')->where('cne', $cne);
        } elseif ($type == 'prof') {
            $cin = $request->input('cin');
            $query = $query->where('type', 'prof')->where('cin', $cin);
        }

        if ($query->count() < 1) {
            return redirect('/register')
                ->with([
                    'alert' => true,
                    'hide_fields' => true,
                    'class' => 'alert-danger',
                    'message' => '<strong>Aucun utilisateur enregistré avec ces coordonnées</strong>... veuillez contactez l\'admin'
                ]);
        };


        $this->create($request->all());

        return redirect('/register')
            ->with([
                'alert' => true,
                'hide_fields' => true,
                'class' => 'alert-info',
                'message' => '<strong>Un email sera envoyé dans quelques instant</strong>... veuillez vérifier votre boite de reception'
            ]);
    }


    public function login(Request $request)
    {
        $this->validate($request, [
            $this->loginUsername() => 'required', 'password' => 'required',
        ]);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        $throttles = $this->isUsingThrottlesLoginsTrait();

        if ($throttles && $this->hasTooManyLoginAttempts($request)) {
            return $this->sendLockoutResponse($request);
        }

        $credentials = $this->getCredentials($request);


        $user = User::where('email', $credentials['email'])->first();

        if ($user && $user->confirmed == 0) {
            return redirect()
                ->back()
                ->with([
                    'alert' => true,
                    'class' => 'danger',
                    'message' => 'Vous devez confirmer votre compte, vérifiez votre boite email.'
                ]);
        }

        if (Auth::guard($this->getGuard())->attempt($credentials, $request->has('remember'))) {
            return $this->handleUserWasAuthenticated($request, $throttles);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        if ($throttles) {
            $this->incrementLoginAttempts($request);
        }

        return $this->sendFailedLoginResponse($request);
    }
}
