<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ChangePasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    protected $redirectTo = '/my-account';

    public function changePassword(Request $request)
    {
        $user = auth()->user();
        $this->validator($request->all())->validate();
        if (Hash::check($request->get('current_password'), $user->password)) {
            /*dd(bcrypt($request->get('new_password')));*/
            $user->password = bcrypt($request->get('new_password'));

            //send email notification to user
            /*Mail::to($user)->send(new ChangePassword($user));*/

            if ($user->save())
            {
                flash('<strong>Password change successfully!</strong>')->success();
                return redirect($this->redirectTo);
            }else
            {
                flash('<strong>Operation not successfully!</strong>')->error();
                return redirect($this->redirectTo);
            }

        } else {
            return redirect()->back()->withErrors('Current password is incorrect');
        }
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'current_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
        ]);
    }
}
