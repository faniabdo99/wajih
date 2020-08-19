<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Hash;
class AuthController extends Controller{
    public function getLogin(){
        return view('login');
    }
    public function postLogin(Request $r){
        if(auth()->attempt(['email' => $r->email , 'password' => $r->password] , true)){
            return redirect()->route('home');
        }else{
            return back()->withErrors('معلومات الدخول غير صحيحة');
        }
    }

    public function getEdit(){
        if(auth()->check()){
            return view('my-account');
        }else{
            return redirect()->route('login');
        }
    }
    public function postEdit(Request $r){
        $User = User::find(auth()->user()->id);

        if($r->has('company_image') && $r->company_image != null && !empty($r->company_image)){
            //Handle image upload
            $UserImage = strtolower(str_replace(' ' , '-' , $User->id)).'.'.$r->company_image->getClientOriginalExtension();
            $r->company_image->storeAs('public/images' ,$UserImage);
            $imageFilePath = $UserImage;
        }else{
            $imageFilePath = $User->company_image;
        }
        if($r->password && $r->password_conf){
            //Handle the password
            if($r->password == $r->password_conf){
                $UserPass = Hash::make($r->password);
            }else{
                return back()->withErrors('كلمة المرور غير متطابقة');
            }
        }else{
            $UserPass = $User->password;
        }
        $UserData = $r->except('password_conf');
        $UserData['company_image'] = $imageFilePath;
        $UserData['password'] = $UserPass;
        $User->update($UserData);
        return back()->withSuccess('تم تحديث معلومات الحساب');
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('home');
    }
}
