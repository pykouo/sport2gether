<?php

namespace App\Http\Controllers\Auth;

use App\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    protected $client;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
        $this->client = new Client(['base_uri' => 'http://140.118.109.185/api/']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'phone' => 'required|numeric|phone',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => bcrypt($data['password']),
            'gender' => $data['gender'],
        ]);
    }


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    protected function login(Request $request)
    {
        $this->validate($request, ['email' => 'required|email', 'password' => 'required']);
        $response = $this->client->request('POST', 'users/login', [
            'form_params' => [
                'email' => $request->input('email'),
                'password' => $request->input('password')
            ]
        ]);
        $user = json_decode($response->getBody(), true);
        if($user['error']){
            return redirect()->back()->with('message',$user['message']);
        }else{
            \Session::put('user_id', $user['user']['id']);
            \Session::put('username', $user['user']['username']);
            \Session::put('gender', $user['user']['gender']);
            return redirect()->to('/activities');
        }

    }

    protected function register(Request $request)
    {
        $this->validate($request, ['email' => 'required|email', 'password' => 'required', 'name' => 'required', 'gender' => 'required',
            'phone' => 'required', 'password_confirmation' => 'required']);

        $response = $this->client->request('POST','users/register', [
            'form_params' => [
                'email' => $request->input('email'),
                'password' => $request->input('password'),
                'username' => $request->input('name'),
                'phone' => $request->input('phone'),
                'gender' => $request->input('gender')
            ]
        ]);
        $user = json_decode($response->getBody(), true);
        if($user['error']){
            return redirect()->back()->with('message', $user['message']);
        }else{
            return redirect()->to('/login')->with('message', $user['message']);
        }
    }
    protected function logout(){
        \Session::flush();
        return redirect()->to('/');
    }
}
