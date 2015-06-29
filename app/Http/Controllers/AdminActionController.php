<?php

namespace App\Http\Controllers;

use App\User;

/**
 * Controller for the Actions of Admin.
 * 
 * @package Election Ddeveloper Website
 * @license 
 * @author Nyan Lynn Htut <naynlynnhtut@hexcores.com>
 */

class AdminActionController extends Controller
{
	/**
	 * Promote user to admin role.
	 *
	 * @param  string $id
	 * @return \Redirect
	 */
	public function promoteUserToAdmin($id)
	{
		$user = User::findOrFail($id);

		if ( $user->promoteToAdmin()) {
			session()->flash('success', 'User is successfully promoted to admin role.');
		} else {
			session()->flash('error', 'Error occured to promote admin role.');
		}

		return back();
	}

	/**
	 * Downgrade admin to user role.
	 *
	 * @param  string $id
	 * @return \Redirect
	 */
	public function downgradeAdminToUser($id)
	{
		$user = User::findOrFail($id);

		if ( $user->downgradeToUser()) {
			session()->flash('success', 'User is successfully downgrade to user role.');
		} else {
			session()->flash('error', 'Error occured to downgrade user role.');
		}

		return back();
	}
}