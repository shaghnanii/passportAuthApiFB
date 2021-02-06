<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialLoginController extends Controller
{
    // github login 
   public function github(){
       return Socialite::driver('github')->redirect();
   }

   public function githubRedirect(){
      $user = Socialite::driver('github')->user();

      $user = User::firstOrCreate([
          'email' => $user->email
      ],
      [
          'name' => $user->name,
          'email' => $user->email,
          'password' => Hash::make(Str::random(24)),
      ]);

      Auth::login($user, true);

      return redirect('/home');
   }

//    facebook login 
   public function facebook(){
       return Socialite::driver('facebook')->redirect();
   }

   public function facebookRedirect(){
       $user = Socialite::driver('facebook')->user();

       $user = User::firstOrCreate([
           'email' => $user->email,
       ],
       [
           'name' => $user->name,
           'email' => $user->email,
           'password' => Hash::make(Str::random(24))
       ]);

       Auth::login($user, true);

       return redirect('/home');
   }

   //    Google login 
   public function google(){
       return Socialite::driver('facebook')->redirect();
   }

   public function googleRedirect(){
       $user = Socialite::driver('facebook')->user();
       dd($user);
       $user = User::firstOrCreate([
            'email' => $user->email,
        ],
        [
            'name' => $user->name,
            'email' => $user->email,
            'password' => Hash::make(Str::random(24))
        ]);

        Auth::login($user, true);

        return redirect('/home');
   }
}
