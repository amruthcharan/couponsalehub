<?php

namespace App\Http\Controllers;

use TCG\Voyager\Models\Post;

class HomeController extends Controller
{
    public function __invoke()
    {
        $posts = Post::published()->paginate(5);
        $popular = Post::published()->whereFeatured(true)->take(5)->get();
        return view('frontend.' . config('nextgen.theme') . '.home', compact(['posts', 'popular']));
    }
}
