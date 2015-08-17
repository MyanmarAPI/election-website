<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Application;

/**
 * Controller for the Dashboard.
 * 
 * @package Election API Website
 * @author Nyan Lynn Htut <naynlynnhtut@hexcores.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

class DashboardController extends Controller
{

	protected $user;

	public function __construct()
	{
		$this->user = Auth::user();
	}

	public function index()
	{
		if ( $this->user->isAdmin())
		{
			return $this->dashboardForAdmin();
		}

		return $this->dashboardForUser();
	}

	protected function dashboardForAdmin()
	{
		$data['user'] = $this->user;

		$data['total_users'] = User::where('role', 'user')->count();

		$data['total_admins'] = User::where('role', 'admin')->count();

		$data['total_apps'] = Application::count();

		$data['users'] = User::latest()->take(10)->get();

		$data['applications'] = Application::latest()->take(10)->get();

		$data['opt_app'] = Application::getAppForSelect($this->user);

		return view('dashboard.admin', $data);
	}

	protected function dashboardForUser()
	{
		$data['opt_app'] = Application::getAppForSelect($this->user);

		$data['user'] = $this->user;
		
		return view('dashboard.user', $data);
	}
}