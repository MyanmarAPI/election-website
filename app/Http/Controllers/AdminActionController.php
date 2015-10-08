<?php

namespace App\Http\Controllers;

use App\User;
use App\Showcase;
use App\Traits\ImageUpload;

/**
 * Controller for the Actions of Admin.
 * 
 * @package Election API Website
 * @author Nyan Lynn Htut <naynlynnhtut@hexcores.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

class AdminActionController extends Controller
{
	use ImageUpload;

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

	/**
	 * Activate the showcase app.
	 *
	 * @param  string $id
	 * @return \Redirect
	 */
	public function activateShowcase($id)
	{
	    $app = Showcase::findOrFail($id);

	    $app->approved = true;

	    if ( $app->save()) {
	    	session()->flash('success', 'Showcase app is successfully activated.');
	    } else {
	    	session()->flash('error', 'Error occured to activate showcase app.');	
	    }

	    return back();
	}

	/**
	 * Deactivate the showcase app.
	 *
	 * @param  string $id
	 * @return \Redirect
	 */
	public function deactivateShowcase($id)
	{
	    $app = Showcase::findOrFail($id);

	    $app->approved = false;

	    if ( $app->save()) {
	    	session()->flash('success', 'Showcase app is successfully deactivated.');
	    } else {
	    	session()->flash('error', 'Error occured to deactivate showcase app.');	
	    }

	    return back();
	}

	/**
	 * Sticky the showcase app.
	 *
	 * @param  string $id
	 * @return \Redirect
	 */
	public function stickyShowcase($id)
	{
	    $app = Showcase::findOrFail($id);

	    if ( $app->sticky) {
	    	$app->unset('sticky');
	    	session()->flash('success', 'Showcase app is successfully remove from sticky lists.');
	    	
	    	return back();
	    }
	    
	    $app->sticky = true;

	    if ( $app->save()) {
	    	session()->flash('success', 'Showcase app is successfully add to sticky lists.');
	    } else {
	    	session()->flash('error', 'Error occured to add to sticky lists showcase app.');	
	    }

	    return back();
	}

	/**
	 * Homepage the showcase app.
	 *
	 * @param  string $id
	 * @return \Redirect
	 */
	public function homepageShowcase($id)
	{
	    $app = Showcase::findOrFail($id);

	    if ( $app->show_in_homepage) {
	    	$app->show_in_homepage = false;
	    	$message = 'remove from homepage';
	    } else {
	    	$app->show_in_homepage = true;
	    	$message = 'add to homepage';
	    }

	    if ( $app->save()) {
	    	session()->flash('success', 'Showcase app is successfully '.$message.'.');
	    } else {
	    	session()->flash('error', 'Error occured to '.$message.' showcase app.');	
	    }

	    return back();
	}

	/**
	 * Remove the showcase app.
	 *
	 * @param  string $id
	 * @return \Redirect
	 */
	public function removeShowcase($id)
	{
	    $app = Showcase::findOrFail($id);

	    if ( $app->icon) {
	    	$this->deleteImage($app->icon);
	    }

	    if ( $app->screenshots) {
	    	foreach ($app->screenshots as $file) {
	    		$this->deleteImage($file);
	    	}
	    }

	    session()->flash('success', 'Showcase app is successfully deleted.');

	    $app->delete();

	    return back();
	}
}