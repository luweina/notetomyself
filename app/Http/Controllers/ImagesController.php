<?php

namespace App\Http\Controllers;

use App\images;
use Illuminate\Http\Request;

class ImagesController extends Controller
{
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
        $images = auth()->user()->images()->get();

        return view('photos')->with(['images'=>$images]);
    }

    public function store(Request $request)
    {



        $userId = auth()->id();
        $data = ['image' => $request->image->getClientOriginalName(),
           'user_id'=> $request['user_id'] =$userId
        ];
        $filename = $request->image->getClientOriginalName();
        $request->image->storeAs('images', $filename, 'public');
        images::create($data);


        return back();
    }
    public function delete($id)
    {
        $image = images::find($id);
        $image->delete();
        return redirect('/photos');

    }

}
