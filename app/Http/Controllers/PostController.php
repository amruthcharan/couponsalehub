<?php

namespace App\Http\Controllers;

use TCG\Voyager\Models\Post;

class PostController extends Controller
{
    public function __invoke($slug) {
        $post = Post::whereSlug($slug)->first();
        $popular = Post::published()->whereFeatured(true)->take(5)->get();
        $related = Post::published()->take(2)->get();
        return view('frontend.' . config('nextgen.theme') . '.single-blog', compact(['post', 'popular', 'related']));
    }
}
