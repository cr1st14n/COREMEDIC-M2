<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function __construct()
    {
        // $this->middleware('guest')->except('logout');
    }
    public function login()
    {
        $credenciales=$this->validate(request(),[
            'usu_ci' => 'required|string',
            'password' => 'required|string'
        ]);
        if (Auth::attempt($credenciales)) {
            return 'true';
        }
        return 'false';
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}