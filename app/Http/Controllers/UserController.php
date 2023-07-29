<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\User;

class UserController extends Controller
{
    private $name;
    private $email;
    private $password;
    //
    public function loginmethod(){
        return view('login');
    }
    public function home_view(){
        return view('home_view');
    }

    public function Register(Request $request){
        if ($request->isMethod('post')) {
            # code...
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $request->password;
            $user->is_allowed = 1;
            $user->is_admin_level = 0;
            $user->save();
        }
    }

    public function get_loginCredentials(Request $request){
        // dd($request);
        if ($request->isMethod('post')) {
            if ($request->action == 'register') {
                # code...
                $this->Register($request);
            }
            else if($request->action == 'login') {
                $user = $this->get_user($request->email);
                if ($user->password == $request->password) {
                    # code...
                    return view('/home');
                }
                # code...
            }
            # code...

        }
        return redirect('/login');
    }
    private function get_user($email){
        if (!empty($email)) {
            # code...
            
            $user = User::where('email',$email)->first();
            $sql = $user->toSql();
            // dd($sql);
            return $user;
        }
    }
}
