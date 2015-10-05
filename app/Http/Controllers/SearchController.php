<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Application;

/**
 * Controller for the Search.
 *
 * @package Election API Website
 * @author Nyan Lynn Htut <naynlynnhtut@hexcores.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
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
		$keyword = $request->query('s');

		$applications = Application::where('key', $keyword)
									->orWhere('name', 'like', '%'.$keyword.'%')
									->paginate();

		$hideFilter = true;

		$query = ['s' => $keyword];

		return view('app.admin-index', compact('applications', 'hideFilter', 'query'));
	}
}