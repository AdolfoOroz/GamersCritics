<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Role;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
	 +----------------+------------------+------+-----+---------+----------------+
| id             | int(10) unsigned | NO   | PRI | NULL    | auto_increment |
| name           | varchar(255)     | NO   |     | NULL    |                |
| email          | varchar(255)     | NO   | UNI | NULL    |                |
| password       | varchar(255)     | NO   |     | NULL    |                |
| remember_token | varchar(100)     | YES  |     | NULL    |                |
| created_at     | timestamp        | YES  |     | NULL    |                |
| updated_at     | timestamp        | YES  |     | NULL    |                |
| profile_pic    | blob             | NO   |     | NULL    |                |
| background_pic | blob             | NO   |     | NULL    |                |
     */
    protected function create(array $data){
	$Profilepic=null;
	$Backgroundpic=null;
	if(!empty($data['profile_picture']))
		{			
			$Profilepic=$data['profile_picture']->store('public');
		}
	if(!empty($data['background_picture']))
		{
			$Backgroundpic=$data['background_picture']->store('public');
		}	
  /*$user = User::create([
    'name'     => $data['name'],
    'email'    => $data['email'],
    'password' => Hash::make($data['password']),
	'profile_pic' => $Profilepic,
	'background_pic' => $Backgroundpic,
  ]);*/
  $NewUser = new User;
  $NewUser->name=$data['name'];
  $NewUser->email=$data['email'];
  $NewUser->password=Hash::make($data['password']);
  $NewUser->profile_pic=$Profilepic;
  $NewUser->background_pic=$Backgroundpic;
  $NewUser->roles()
    ->attach(Role::where('name', 'cliente')->first());
  $NewUser->save();
  return $NewUser;
}
	
	
}
