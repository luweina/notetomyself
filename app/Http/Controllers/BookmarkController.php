<?php

namespace App\Http\Controllers;

use App\Bookmark;
use Illuminate\Http\Request;

class BookmarkController extends Controller
{
          /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function store(Request $request)
    {

        $request->validate([
            'bookmark'=> 'url'
        ]);
        $userId = auth()->id();
        $request['user_id'] =$userId;
        Bookmark::create($request->all());
        return back();
    }

}
