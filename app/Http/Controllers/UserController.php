<?php

namespace App\Http\Controllers;

use Auth;
use App\User;

/**
 * Controller for the User Management for Admin.
 * 
 * @package Election Ddeveloper Website
 * @license 
 * @author Nyan Lynn Htut <naynlynnhtut@hexcores.com>
 */

class UserController extends Controller
{

	protected $user;

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
		$users = User::where('role', '=', 'user')->paginate(20);

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
		$user->save();

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
		$user->save();

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
			session()->flash('success', 'User is successfully deleted.');
		} catch (\Exception $e) {
			session()->flash('error', 'Error occured to delete the user.');
		}

		return back();
	}


}