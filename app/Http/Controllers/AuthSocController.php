<?php

namespace App\Http\Controllers;
use App\User;
use App\Provider;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite ;
class AuthSocController extends Controller
{

    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider($provider)
    {

        return Socialite::driver($provider)->redirect();

    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback($provider)
    {

        $user = Socialite::driver($provider)->user();
        // we check if this user already has an account
        $selectedProvider = Provider::where('provider_id', $user->getId())->first() ;
        if (!$selectedProvider){
            // this user didn't sign up with this provider
            // we check if he did with others
            $realUser  = User::where('email' , $user->getEmail())->first();
            if(!$realUser){
                // this user is totaly a new one
                $realUser =  new User();
                $realUser->name = $user->getName();
                $realUser->email = $user->getEmail();
                $realUser->save();
            }
            $newProvider = new Provider();
            $newProvider->provider_id = $user->getId();
            $newProvider->provider = $provider;
            $newProvider->user_id = $realUser->id ;
            $newProvider->save();
        }else{
            //this user has already exist , let's handle login
            $realUser = User::find($selectedProvider->user_id);
        }
        auth()->login($realUser) ;

         return Redirect('/home');
    }


}
