<?php

namespace App\Http\Controllers;

use App\Models\ShortLink;
use Illuminate\Contracts\View\Factory;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory
     */
    public function index(): Factory
    {
        $links = ShortLink::latest()->get();

        return view('index', compact('links'));
    }
}
