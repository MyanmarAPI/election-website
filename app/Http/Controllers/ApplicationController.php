<?php

namespace App\Http\Controllers;

use App\Application;
use App\Http\Requests\ApplicationFormRequest;
use App\Util\AppKeyGenerator;
use Auth;

/**
 * Controller for the API Application.
 * 
 * @package Election Ddeveloper Website
 * @license 
 * @author Nyan Lynn Htut <naynlynnhtut@hexcores.com>
 */
class ApplicationController extends Controller
{
	/**
	 * Current logged in user
	 *
	 * @var \App\User
	 */
	protected $user;

	/**
	 * Create new application controller instance.
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
		if ( $this->user->isAdmin())
		{
			$applications = Application::with('user')->get();

            return view('app.admin-index', compact('applications'));
		}
		
        $applications = Application::ownBy($this->user)->get(); 

		return view('app.user-index', compact('applications'));
	}

	/**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
	public function create()
	{
		return view('app.form');
	}

	 /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
	public function store(ApplicationFormRequest $request)
	{
		$app = new Application($request->only('name', 'description', 'type'));

		if ($app = $this->user->applications()->save($app)) {

			$generator = new AppKeyGenerator($this->user);

			$app->key = $generator->generate($app);
			$app->save();
			
			session()->flash('success', 'Application is successfully created.');

			return redirect()->route('application');
		}

		session()->flash('error', 'Error occured to create application.');

		return back()->withInput();
	}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $id
     * @return Response
     */
    public function edit($id)
    {
        $model = Application::getByIdForUser($id, $this->user);
        
        return view('app.form', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Request\ApplicationFormRequest $request
     * @param  string  $id
     * @return Response
     */
    public function update(ApplicationFormRequest $request, $id)
    {
        $app = Application::getByIdForUser($id, $this->user);

        $app->fill($request->only('name', 'description', 'type'));

        if ($app->save()) {
            
            session()->flash('success', 'Application is successfully updated.');

            return redirect()->route('application');
        }

        session()->flash('error', 'Error occured to update your application.');

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
            Application::ownBy($this->user)
                        ->where('_id', $id)
                        ->delete();

            session()->flash('success', 'Application is successfully deleted.');
        } catch (\Exception $e) {
            session()->flash('error', 'Error occured to delete application.');
        }

        return back();
    }
}