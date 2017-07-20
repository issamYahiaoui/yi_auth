<?php

namespace App\Http\Controllers;

use App\Provider;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Image ;
use Illuminate\Support\Facades\File;
class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    // render index page
    public function index() {
        $param = [
            'active' => 'dashboard',
            'admins' => User::where('is_admin' , true)->get(),
            'users' =>User::all() ,
            'facebook_users' => Provider::where('provider' , 'facebook')->get() ,
            'google_users' =>  Provider::where('provider' , 'google')->get() ,
            'paypal_users' =>  Provider::where('provider' , 'paypal')->get()
        ];
        return !auth()->user()->isAdmin() ? view('subscribers.index')  : view('admin.dashboard')->with($param)  ;
    }
    // render profil page
    public function profil () {
        $param = [
            'active' => 'profil'
        ];
        return !auth()->user()->isAdmin() ? view('subscribers.profil')->with($param) : view('admin.profil')->with($param) ;
    }
    //render list of users for the admin
    public function getUsers(){
        $param = [
            'active'=> 'users' ,
            'users' => User::where('is_admin',false)->orderBy('created_at','desc')->paginate(5)
        ];

        return view('admin.subscribers')->with($param) ;
    }
    //handle user creation
    public function store(Request $request)
    {
        $rules = [
            'first_name' => 'required',
            'name' => 'required',
            'username' => 'required',
            'password' => 'required|confirmed',
            'email' => 'required|email|unique:users',
        ];

        $message = [
            'password.confirmed' => "Confirm your password please !",
        ];
        $this->validate($request, $rules, $message);
        $user = User::create([
            'first_name' => $request->get('first_name'),
            'name' => $request->get('name'),
            'username' => $request->get('username'),
            'password' => bcrypt($request->get('password')),
            'email' => $request->get('email'),

        ]);
        if ($request->get('role') == 'patient') {
            Patient::create([
                'id_user' => $user->id,
                'type' => $request->get('type')
            ]);
        }


        return Redirect::back();
    }
    //handle user updating
    public function update(Request $request, $id)
    {
        $rules = [
            'first_name' => 'required',
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email',
        ];


        $this->validate($request, $rules);
        User::find($id)->update([
            'first_name' => $request->get('first_name'),
            'name' => $request->get('name'),
            'username' => $request->get('username'),
            'email' => $request->get('email'),
        ]);
        Session::Flash('changesSaved', 'Your profil is updated successfuly');
        return Redirect::back();
    }
    //handle user deleting
    public function destroy($id)
    {
        User::destroy($id);
        return Redirect::back();

    }
    //handle password changing
    public function changePassword(Request $request)
    {

        $rules = [
            'password' => 'required',
            'new_password' => 'required|confirmed'
        ];

        $message = [
            'new_password.confirmed' => 'Confirm your password please !',
        ];


        $this->validate($request, $rules, $message);

        if (Hash::check($request->get('password'), Auth::user()->password)) {
            User::find(Auth::user()->id)->update([
                'password' => bcrypt($request->get('new_password'))
            ]);
            Session::Flash('successPassword', 'Passsword successfuly changed');
        } else {
            Session::Flash('failedPassword', 'Old password is incorrect');
        }
        return Redirect::back();
    }
    //handle avatar changing
    public function changePic(Request $request)
    {
        $rules = [
            'img' => 'image|mimes:jpeg,jpg,png,gif|required|max:20000'
        ];

        $message = [
            'img.required' => 'Choose an image!',
            'img.image' => 'Insert an image please!!',
            'img.max' => 'the Size max of a picture is  10 BM !!',
        ];


        $this->validate($request, $rules, $message);
        if (Auth::user()->avatar != 'default-avatar.png') {
            File::Delete('avatar/' . Auth::user()->avatar);
        }

        $img = Auth::user()->id . time() . '.png';
        Image::make($request->file('img'))->save(public_path('avatar/' . $img));
        $user = User::find(auth()->user()->id )->update(['avatar' => $img]);
        Session::Flash('responseAvatar', 'Picture successfuly changed');

        return Redirect::back();
    }

}
