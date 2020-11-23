<?php

namespace App\Http\Controllers;

use App\Category;
use TCG\Voyager\Models\Post;

class HomeController extends Controller
{
    public function __invoke()
    {
        $categories = Category::homepage()->take(8);
        $posts = Post::published()->latest('updated_at')->take(6)->get()->toArray();
        $right = array_slice($posts,0,2);
        $slider = array_slice($posts,2, 4);
        return view('frontend.' . config('nextgen.theme') . '.home', compact(['right', 'slider', 'categories']));
    }
}
