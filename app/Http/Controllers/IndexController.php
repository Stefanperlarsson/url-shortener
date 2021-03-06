<?php

namespace App\Http\Controllers;

use App\Models\ShortLink;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Support\Str;

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

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate(
            ['link' => 'required|url'],
            [
                'required' => 'URLを入力してください',
                'url' => 'http://url.comのようなURLを入力してください'
            ]
        );

        ShortLink::create([
            'link' => $request->link,
            'code' => Str::random(config('url-shortener.size')),
        ]);

        return redirect('/')
            ->with('success', 'リンクを作成しました！');
    }

    /**
     * Display a listing of the resource.
     *
     * @return RedirectResponse
     */
    public function link($code)
    {
        return redirect(ShortLink::where('code', $code)->first()->link);
    }
}
