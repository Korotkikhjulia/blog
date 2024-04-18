<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController2 extends Controller
{
    public function index()
    {
        return view('posts.index');
    }

}
