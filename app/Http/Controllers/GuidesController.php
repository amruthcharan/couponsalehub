<?php

namespace App\Http\Controllers;

use App\Category;
use TCG\Voyager\Models\Post;

class GuidesController extends Controller
{
    public function __invoke()
    {
        $posts = Post::published()->paginate(10);
        $categories = Category::homepage()->take(8);
        return view('frontend.' . config('nextgen.theme') . '.blog.index', compact(['posts', 'categories']));
    }
}
