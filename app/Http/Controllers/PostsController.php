<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {

        return $request->all();

    }
}
