<?php

namespace App\Http\Controllers;
use Auth;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Http\Input;
use App\Category;
use App\User;
use App\Profile;
use App\Http\Requests;

class AuthController extends Controller
{   
    public function index()
    {
        return view('dashboard.index');
    }

    public function register()
    {
        return view('dashboard.register');
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $this->validate($request, [
            'name' => 'required|unique:users',
            'email' => 'required|unique:users',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required'
        ],[
            'name.required' => 'Username wajib diisi.',
            'name.unique' => 'Username sudah ada yang punya. Coba yang lain.',
            'email.required' => 'Email wajib diisi.',
            'email.unique' => 'Email sudah terdaftar.  Coba yang lain.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 6 karakter',
            'password.confirmed' => 'Kedua kolom password harus sama.'
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        $userprofile = new Profile;
        $userprofile->user_id = $user->id;
        $userprofile->save();

        return back()->with('success', 'User baru sudah ditambahkan.');
    }
    
    public function login(){
    	return view('dashboard.login');
    }

    public function dologin(Request $request){        

    	$this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]); 
        
    	if(Auth::attempt(['email' => $request->input('email'),'password' => $request->input('password')])){
        	return view('dashboard.index');
        }                      
        return view('dashboard.login');
    }
    
    public function profile($id){
        $detail = User::whereId($id)->first();
        return view('dashboard.profile',compact('detail'));
    }    

    public function logout(){
    	Auth::logout();
    	return redirect()->route('site.home');
    }

    public function error401(){
    	return view('errors.401');
    }

    public function update(Request $request, $id)
    {   
        //@dd($request->all());
        $profile = Profile::find($id);
        
        $profile->update([
         'first_name'   => $request->first_name,
         'last_name'    => $request->last_name,
         'nickname'     => $request->nickname,
         'phone'        => $request->phone,
         'facebook'     => $request->facebook,
         'instagram'    => $request->instagram,
         'address'      => $request->address,
         'photo'        => $request->photo,
        ]);

        $data = User::find($request->id_user);

        $data->update([
         'email'   => $request->email,
        ]);

        return back()->with('success', 'Profile updated');
    }

    public function showChangePwd(){
        return view('dashboard.changepassword');
    }

    public function changePwd(Request $request){
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Password Anda saat ini tidak cocok dengan Password yang Anda berikan. Silakan coba lagi.");
        }
        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","Password baru tidak boleh sama dengan Password Anda saat ini. Silakan pilih Password yang berbeda.");
        }
        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);
        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();
        return redirect()->back()->with("success","Password berhasil dirubah !");

    }
}
