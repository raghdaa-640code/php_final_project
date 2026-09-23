<?php

namespace App\Http\Controllers\User;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function userhome(){
        $user= User::get();
        return view('user.userhome',compact('user'));
    }
    public function profile($id)
    {    $user= User::findOrFail($id);
        return view('user.profile',compact('user'));
    }
    public function editprofile($id){
       $user= User::findorfail($id);
       return view('user.edit',compact('user'));
    }
    public function updateuser($id, UserRequest $request){
        $user= User::findorfail($id);
        $data=$request->validated();
        if ($request->hasFile('image')){
            $phextension=$request->file('image')->getClientOriginalExtension();
            $username=$user->name;
            $request->file('image')->storeAs('images', $username . $user->id . ".". $phextension,'public');
            $data['image']='images/'. $username.$user->id .".".  $phextension;
            }else{
                $data['image']=$user->image;
            }

        $user->update($data);
        return redirect()->route('user.profile', $user->id)->with('message','data updated successfly');
        
    }

    public function deleteuser($id)
{
    $user = User::findOrFail($id);
    Auth::logout();
    $user->delete();

    $request = request();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('auth.register');
    }   
}
// class UserController extends Controller{
    
//     public function userhome(){
//         $user=User::get();
//         return view('user.userhome');
//     }

//     public function profile($id){
//         $id= User::findorfail($id);
//         return view('user.profile');
//     }
// }

