<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    private $numcart;
    public function __construct()
    {
        $this->numcart = 0;
        // $this->middleware('guest');
    }
    public function showRegister(){
        return view('users.register', ["numcart"=>$this->numcart]);
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            // 'password' => ['required', 'string', 'min:8'],
            // 're_password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
    public function checkEmail($gmail, $name){
        try {
            Mail::send('emails.welcome', compact('name'), function($email) use($gmail, $name){
                $email->subject('Thư chào mừng từ CellphoneS');
                $email->to($gmail, $name);
            });
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
    public function register(Request $request){
        $email = $request->input('email');
        $name = $request->input('name');
        if ($this->checkEmail($email, $name)) {
            session()->flash('error', 1);
            $this->validator($request->only('name', 'email', 'password', 're_password'))->validate();
            $this->create($request->only('name', 'email', 'password'));
            session()->flash('error', 2);
        } else {
            session()->flash('error', 3);
            return redirect()->route('register.route');
        }
        return redirect()->route('login.route');
    }
    
}
