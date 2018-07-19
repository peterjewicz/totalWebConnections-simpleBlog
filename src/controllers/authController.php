<?php

namespace totalWebConnections\simpleBlog\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use totalWebConnections\simpleBlog\Models\User;
use Auth;
use Hash;
use DB;
use Config;

class authController extends Controller
{

    //******START ROUTE DISPLAYS******
    public function displayLogin(){
        return view('simpleBlog::login');
    }
    public function displayRegister(){
        return view('simpleBlog::register');
    }
    //******END ROUTE DISPLAYS********


    //Handles Login functionality
    public function login(){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $provider = config('simpleBlog.providers');
        Config::set('auth.providers',$provider);

        if (Auth::attempt(['username' => $username, 'password' => $password])) {
            return redirect('blog/dashboard');
        }

        //TODO display errors on login page
        echo('login failed');

    }

    //Handles initial registration of the admin
    public function register(){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = Hash::make($_POST['password']);

        //TODO move to model
        $user = new User();
        $user->username = $username;
        $user->email = $email;
        $user->password = $password;
        $user->save();

        DB::table('simpleBlog_settings')->insertGetId(
            ['isset' => 'true']
        );

        //login
        Auth::attempt(['username' => $username, 'password' => $password]);

        return redirect('blog/dashboard');
    }
}
