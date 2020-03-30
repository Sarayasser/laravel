<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;

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
    public function redirectToProvider($driver)
    {
    return Socialite::driver($driver)->redirect();
    }
    public function handleProviderCallback(){
            $user = Socialite::driver(request()->provider)->user();
            $existingUser = User::where('email', $user->email)->first();
                if($existingUser){
                auth()->login($existingUser, true);
            } else {
                $newUser                  = new User;
                $newUser->name            = $user->name;
                $newUser->email           = $user->email;
                $newUser->provider_id       = $user->id;
                $newUser->avatar          = $user->avatar;
                $newUser->save();
                auth()->login($newUser, true);
            }
        
        return redirect()->to('/posts');
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
