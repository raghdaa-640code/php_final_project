<?php 

namespace App\Http\Controllers\Admin;

use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller{
    
public function showlogin(){
    return view('admin.users.login');
}

public function login(LoginRequest $request){
    


}

public function create()
    {
        return view('admin.users.create');
    }



}

?>