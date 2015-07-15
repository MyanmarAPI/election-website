<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Traits\ProfileValidator;
use App\Events\UserPasswordChanged;
use App\Http\Controllers\Controller;

/**
 * Controller for the Profile Management.
 *
 * @package Election API Website
 * @author Nyan Lynn Htut <naynlynnhtut@hexcores.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

class ProfileController extends Controller
{
    use ProfileValidator;

    /**
     * Current logged in user.
     *
     * @var \App\User
     */
    protected $user;

    /**
     * Create profile controller instance.
     */
    public function __construct()
    {
        $this->user = Auth::user();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function getProfile()
    {
        return view('profile.profile', ['user' => $this->user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postProfile(Request $request)
    {
        $inputs = $request->only('name', 'email');

        $validator = $this->validatorForProfile($inputs);

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        if ($this->user->fill($inputs)->save()) {
            session()->flash('success', 'Your profile is updated.');

            return redirect('dashboard');
        }

        session()->flash('error', 'Error occured to update your profile!');

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function getPassword()
    {
        return view('profile.password', ['user' => $this->user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postPassword(Request $request)
    {
        $inputs = $request->only('old_password', 'password', 'password_confirmation');

        $validator = $this->validatorForPassword($inputs);

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        // Check old password from input is same with 
        // password from user model.
        if ( ! $this->checkPassword($this->user, $inputs['old_password'])) {
            session()->flash('error', 'Current Password is wrong!');

            return back();
        }

        $this->user->password = bcrypt($inputs['password']);
        $this->user->save();

        // Re login user
        Auth::login($this->user);

        event(new UserPasswordChanged($this->user));

        session()->flash('success', 'Your password is already changed.');

        return redirect('dashboard');
    }
}
