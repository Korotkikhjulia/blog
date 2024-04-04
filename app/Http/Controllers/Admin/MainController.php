<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index()
    {
        // $tag = new Tag();
        // $tag->title='Привет мир!';
        // $tag->save();
        $posts = DB::table('posts')->count();
        $users = DB::table('users')->count();

        return view('admin.index', compact('posts', 'users'));
    }
}
