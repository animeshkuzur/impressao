<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use Socialite;

use App\User;
use App\SocialAccount;

class AuthController extends Controller
{
    public function auth(){
        if(Auth::check()){
            return redirect('print');    
        }
    	return view('pages.login');
    }

    public function register(){
        if(Auth::check()){
            return redirect('print');    
        }
    	return view('pages.register');
    }

    public function logout(){
        if(Auth::check()){
            Auth::logout();    
        }
        return redirect()->route('auth');
    }

    public function email(Request $request){
    	try{
    		$this->validate($request, User::$login_validation_rules);
    		$data = $request->only('email','password');
    		if (Auth::attempt($data)){
            	return redirect('/print');
        	}
        	else{
            	return back()->withInput()->withErrors(['errors' => 'Username or password is invalid']);
        	}
    	}
    	catch(Exception $e){

    	}
    }

    public function emailregister(Request $request){
    	try{
    		$this->validate($request, User::$register_validation_rules);
    		$data = $request->only('name','email','password','password2');
    		if($data['password']!=$data['password2']){
            	return back()->withInput()->withErrors(['errors' => 'Confirmation password did not match']);
        	}
        	$user = User::insert([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
            ]);
            if($user){
                if(Auth::attempt(['email' => $data['email'], 'password' => $data['password'] ])){
                    return redirect('/print');
                } 
            }
    	}
    	catch(Exception $e){

    	}
    }

    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        try{
            $user = Socialite::driver($provider)->user();


            if ($authUser = SocialAccount::where('provider_id', $user->id)->first()) {
                $temp_user = User::where('email',$user->email)->first();
            	Auth::login($temp_user, true);
        		return redirect('print');
        	}
            elseif($fuser = User::where('email',$user->email)->first()){
                return redirect('/auth')->withErrors(['errors', 'User already registered!']);
            }
        	else{
        		$new_user = User::create([
           			'name' => $user->name,
           			'email' => $user->email
       			]);	
   				$new_user->socialAccounts()->create(
   					['provider_id' => $user->id, 'provider' => $provider]
   				);

   				Auth::login($new_user, true);
        		return redirect('print');
        	}
        }
        catch(Exception $e){
            return redirect('/');
        }
    }
}
