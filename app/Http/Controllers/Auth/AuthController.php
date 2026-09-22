<?php

namespace App\Http\Controllers\Auth;
use App\Http\Requests\LoginRequest;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
// use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showlogin(){
    return view('auth.login');
}

public function login(LoginRequest $request){

    $data = $request->validated();
    
    if (Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
        
        $request->session()->regenerate();

        if (Auth::user()->role === 'admin'){
            return redirect()->route('admin.users.dashboard');
        }
        
        return redirect()->route('user.userhome');
    }
    
    return back()->withErrors(['email' => 'البيانات المدخلة غير صحيحة',])->onlyInput('email');

}

public function register(){
    
        return view('auth.register');
}

public function handleregister(RegisterRequest $request){
    
    $data = $request->validated();

    if ($request->hasFile('image')){
        $path = $request->file('image')->store('users','public');
        $data['image'] = $path;
    }

    $data['password'] = Hash::make($request->password);

    $data['role'] ='user';

    $user = User::create($data);

    Auth::login($user);

    if (Auth::user()->role === 'admin'){
            return redirect()->route('admin.users.dashboard');
        }

    return redirect()->route('user.userhome')->with('success','تم إنشاء الحساب بنجاح');

}

public function logout(){
    
    Auth::logout();

    return redirect()->route('auth.login')->with('success','تم تسجيل الخروج');

}

}

?>