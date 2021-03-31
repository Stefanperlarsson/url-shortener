<?php

namespace App\Http\Controllers;

use App\Models\ShortLink;
use Illuminate\View\View;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $links = ShortLink::latest()->get();

        return view('index', compact('links'));
    }
}
