<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Showcase;
use App\Http\Controllers\Controller;

class ShowcaseFrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $type = $request->input('t');

        if ( $type) {
            $apps = Showcase::whereIn('type', [$type])
                    ->where('published', 'p');
        } else
        {
            $apps = Showcase::where('published', 'p');    
        }

        $apps = $apps->where('approved', true)
                    ->orderBy('sticky', 'desc')
                    ->latest()
                    ->paginate(20);
        
        if ( $type) {
            $hasPagination = true;
            $apps->appends(['t' => $type]);
        } else {
            $hasPagination = $apps->hasPages();
        }

        return view('showcase.index', compact('apps', 'hasPagination'));
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return Response
     */
    public function show($slug)
    {
        $app = Showcase::where('published', 'p')
                        ->where('approved', true)
                        ->where('slug', $slug)
                        ->firstOrFail();

        return view('showcase.show', compact('app'));
    }

    /**
     * Preview showcase app before published.
     *
     * @param  string  $slug
     * @return Response
     */
    public function preview($slug)
    {
        $app = Showcase::where('slug', $slug);

        if ( ! Auth::user()->isAdmin()) {
            $app = $app->ownBy(Auth::user());
        }

        $app = $app->firstOrFail();

        return view('showcase.show', compact('app'));
    }
}
