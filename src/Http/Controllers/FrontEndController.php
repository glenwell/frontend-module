<?php

namespace Modules\FrontEnd\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Admin\Models\Post;

class FrontEndController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('frontend::index')->with(['posts' => Post::all()]);
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('frontend::show');
    }
}
