<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function uploadImage (Request $request) {
        $request->image->store('images');
        return 'uploaded';
    }
}
