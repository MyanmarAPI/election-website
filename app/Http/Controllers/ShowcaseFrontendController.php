<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Showcase;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ShowcaseFrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $apps = Showcase::where('published', 'p')
                        ->where('approved', true)
                        ->orderBy('sticky', 'desc')
                        ->latest()
                        ->paginate(20);

        return view('showcase.index', compact('apps'));
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
