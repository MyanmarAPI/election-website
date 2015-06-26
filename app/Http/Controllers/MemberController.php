<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Traits\CreateUser;
use App\Http\Requests\MemberFormRequest;

/**
 * Controller for the Admin Member Management for Administrator.
 * 
 * @package Election Ddeveloper Website
 * @license 
 * @author Nyan Lynn Htut <naynlynnhtut@hexcores.com>
 */

class MemberController extends Controller
{
	use CreateUser;

	/**
	 * Current logged in user.
	 *
	 * @var \App\User
	 */
	protected $user;

	/**
	 * Create new member controller instance.
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
		$members = User::getAdminWithPaginate();

		return view('member.index', compact('members'));
	}

	/**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
	public function getCreate()
	{
		return view('member.form');
	}

	 /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
	public function postCreate(MemberFormRequest $request)
	{
		if ( $this->create($request->all(), 'admin') ) {
			
			session()->flash('success', 'Admin Member is successfully created.');

			return redirect()->route('members');
		}

		session()->flash('error', 'Error occured to create admin member.');

		return back()->withInput();
	}

	/**
     * Remove the specified resource from storage.
     *
     * @param  string  $id
     * @return Response
     */
    public function destroy($id)
    {
        try {
            User::destroy($id);

            session()->flash('success', 'Member is successfully deleted.');
        } catch (\Exception $e) {
            session()->flash('error', 'Error occured to delete member.');
        }

        return back();
    }

}