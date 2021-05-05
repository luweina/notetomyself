<?php

namespace App\Http\Controllers;

use App\Bookmark;
use App\Todo;


use Illuminate\Http\Request;

class TodoController extends Controller
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
    public function index()
    {
        $todos = auth()->user()->todos()->get();
        $bookmarks = auth()->user()->bookmarks()->get();
        return view('todo')->with(['todos'=>$todos, 'bookmarks'=>$bookmarks]);
    }
    public function store(Request $request)
    {

        $request->validate([
            'todo'=> 'required|max:255'
        ]);
        $userId = auth()->id();
        $request['user_id'] =$userId;
        Todo::create($request->all());
        return back();
    }
}


