<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
        $this->middleware('guest')->except('logout');
    }

    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider($provider)
    {
        
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($provider)
    {
        // $user = Socialite::driver($provider)->stateless->user(); stateless for API
        $user = Socialite::driver($provider)->user();
        // dd($user);
        // dd($user->getNickname());

        // On vérifie si le mail existe déjà ou pas
        $existingUser = User::whereEmail($user->getEmail())->first();
       
        // Si le mail existe déjà, on connecte l'utilisateur et on fait une redirection
        if ($existingUser) {
            auth()->login($existingUser);
            return redirect($this->redirectPath());
        } else {

            $new_user = User::create([
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'password' => bcrypt('bonheur1'),
            ]);
    
            $existingUser = User::whereEmail($user->getEmail())->first();

            auth()->login($new_user);
    
            return redirect($this->redirectPath());
        }

        
        
        // $user->token;
    }
}
