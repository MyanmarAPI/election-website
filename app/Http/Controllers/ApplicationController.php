<?php

namespace App\Http\Controllers;

use Auth;
use App\Application;
use App\Util\AppKeyGenerator;
use App\Http\Requests\ApplicationFormRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;


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
		
        $applications = Application::ownBy($this->user)->latest()->get(); 

		return view('app.user-index', compact('applications'));
	}

	/**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
	public function create()
	{
        if ( $this->user->isAdmin()) {
            session()->flash('error', 'Admin cannot create new application.');

            return redirect()->route('application');
        }

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
        try {
            $model = Application::getByIdForUser($id, $this->user);
        } catch (ModelNotFoundException $e) {
            session()->flash('error', 'Sorry, you cannot edit the application.');

            return redirect()->route('application');
        }
        
        
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
        try {
            $app = Application::getByIdForUser($id, $this->user);
        } catch (ModelNotFoundException $e) {
            session()->flash('error', 'Sorry, you cannot update the application.');

            return redirect()->route('application');
        }

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

    /**
     * Disable the application status.
     *
     * @param  string  $id
     * @return Response
     */
    public function disable($id)
    {
        $app = Application::find($id);

        if ( $app->makeDisable()) {
            session()->flash('success', 'Application is successfully disabled.');
        } else {
            session()->flash('error', 'Error occured to disable application.');
        }

        return back();
    }

    /**
     * Enable the application status.
     *
     * @param  string  $id
     * @return Response
     */
    public function enable($id)
    {
        $app = Application::find($id);

        if ( $app->makeEnable()) {
            session()->flash('success', 'Application is successfully enabled.');
        } else {
            session()->flash('error', 'Error occured to enable application.');
        }

        return back();
    }
}