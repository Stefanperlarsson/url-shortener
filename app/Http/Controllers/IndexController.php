<?php

namespace App\Http\Controllers;

use App\Models\ShortLink;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $links = ShortLink::latest()->get();

        return view('index', compact('links'));
    }
}
