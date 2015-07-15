<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Application;

/**
 * Controller for the Register User Management.
 *
 * @package Election API Website
 * @author Nyan Lynn Htut <naynlynnhtut@hexcores.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

class UserController extends Controller
{
	/**
	 * Current logged in user.
	 *
	 * @var \App\User
	 */
	protected $user;

	/**
	 * Create new user controller instance.
	 */
	public function __construct()
	{
		$this->user = Auth::user();
	}

	/**
     * Display a listing of the resource.
     *
     * @return Response
     */
	public function index()
	{
		$users = User::getUserWithPaginate();

		return view('user.index', compact('users'));
	}

	/**
     * Ban the given user.
     *
     * @return Response
     */
	public function ban($id)
	{
		$user = User::findOrFail($id);
		$user->status = 'b';

		if ($user->save()) {
			Application::where('user_id', $id)->update(['disable' => true]);
		}


		return back();
	}

	/**
     * Remove given user from banned lists.
     *
     * @return Response
     */
	public function unban($id)
	{
		$user = User::findOrFail($id);
		$user->status = 'a';
		
		if ($user->save()) {
			Application::where('user_id', $id)->unset('disable');
		}

		return back();
	}

	/**
     * Display a listing of the resource.
     *
     * @return Response
     */
	public function destroy($id)
	{
		$user = User::findOrFail($id);

		try {
			$user->delete();

			Application::where('user_id', $id)->delete();

			session()->flash('success', 'User is successfully deleted.');
		} catch (\Exception $e) {
			session()->flash('error', 'Error occured to delete the user.');
		}

		return back();
	}


}