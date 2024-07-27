<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;

class SprintsController extends Controller
{
    public function index()
    {

        return view("control", [
            "posts" => Posts::all(),
        ]);
    }

    public function update(Posts $post)
    {
        $post->content = request()->get('content', '');
        $post->save();
        return redirect()->route('home');
    }
}
