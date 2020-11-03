<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class BookController extends Controller
{
    public function book()
    {
        $data = "Data All Book";
        return Response()->json($data, 200);
    }

    public function bookAuth()
    {
        $data = "Welcome ". Auth::user()->name;
        return Response()->json($data, 200);
    }
}
