<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Application;

/**
 * Controller for the Search.
 * 
 * @package Election Ddeveloper Website
 * @license 
 * @author Nyan Lynn Htut <naynlynnhtut@hexcores.com>
 */

class SearchController extends Controller
{
	/**
	 * Search user by email.
	 *
	 * @return \Redirect
	 */
	public function user(Request $request)
	{
		$query = $request->query('s');

		$users = User::whereEmail($query)->where('role', '=', 'user')->paginate();

		return view('user.index', compact('users'));
	}

	/**
	 * Search member(admin) by email.
	 *
	 * @return \Redirect
	 */
	public function member(Request $request)
	{
		$query = $request->query('s');

		$members = User::whereEmail($query)->where('role', '=', 'admin')->paginate();

		return view('member.index', compact('members'));
	}


	/**
	 * Search application.
	 *
	 * @return \Redirect
	 */
	public function application(Request $request)
	{
		$query = $request->query('s');

		$applications = Application::where('key', $query)->paginate();

		return view('app.admin-index', compact('applications'));
	}
}