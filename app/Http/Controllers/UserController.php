<?php

namespace App\Http\Controllers;

use Validator;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Handle login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request) {
        $error_message  = false;

        if ($request->isMethod('post')) {
            $validator = Validator::make($request->input(), [
                'email'     => 'bail|email|required',
                'password'  => 'bail|required',
            ]);

            if ($validator->fails()) {
                $error_message = $validator->errors()->all()[0];
            } else {
                $userData = array(
                    'email'     => $request->input('email'),
                    'password'  => $request->input('password')
                );

                if (Auth::attempt($userData)) {
                    $auth = User::where('email', '=', $request->input('email'))->first();

                    session([
                        'user_name'   => $auth->name,
                        'user_email'  => $auth->email,
                    ]);

                    $auth->last_login = format_timestamp();
                    $auth->last_ip    = $_SERVER['REMOTE_ADDR'];
                    $auth->save();

                    return redirect('admin/');
                } else {
                    $error_message = "E-mail atau password yang anda masukan salah!!!";
                }
            }
        }

        $data = [
            'title'         => 'Masuk',
            'error_message' => $error_message,
            'input'         => $request->input()
        ];

        return view('dashboard.pages.auth.login', $data);
    }

    /**
     * Handle logout.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        session()->flush();

        return redirect('login');
    }
}
