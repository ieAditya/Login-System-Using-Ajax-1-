<?php

namespace App\Http\Controllers;

use App\Models\website_users;
use Illuminate\Http\Request;

class WebsiteUsersController extends Controller
{
    //
    public function index()
    {
        return view('login');
    }
    public function signup()
    {
        return view('signup');
    }
    public function home()
    {
        return view('home');
    }
    public function logout(Request $request)
    {
        // $request->session()->flush();
        $request->session()->forget('user_name');
        $request->session()->forget('user_image');
        $request->session()->forget('user_email');
        return view('login');
    }
    public function loginauth(Request $request)
    {
        $user = website_users::where('email', $request->email)->first();
        if ($user->password == $request->password) {
            $request->session()->put('user_name', $user->name);
            $request->session()->put('user_image', $user->image);
            $request->session()->put('user_email', $user->email);
            return view('home');
            // return response()->json([
            //     "response" => "Successfully logged in!!"
            // ]);
        } else {
            return view('login');
        }
    }
    public function registeruser(Request $request)
    {
        $user = website_users::where('email', $request->email)->first();
        if ($user === null) {
            $user = new website_users;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $request->password;

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('products'), $imageName);
            $user->image = $imageName;

            $user->save();
            return response()->json([
                "res" => "Account created!! Now you can login"
            ]);
        } else {
            return response()->json([
                "res" => "Account already exist, try logging in"
            ]);
        }

    }
}
