<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\notes;

class NotesController extends Controller
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
        $notes = auth()->user()->notes()->get();

        return view('notes')->with(['notes'=>$notes]);
    }
    public function store(Request $request)
    {

        $request->validate([
            'note'=> 'required|max:2000'
        ]);
        $userId = auth()->id();
        $request['user_id'] =$userId;
        notes::create($request->all());
        return back();
    }
}
