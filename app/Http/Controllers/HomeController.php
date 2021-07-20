<?php

namespace App\Http\Controllers;

use App\Category;
use App\Slide;
use App\Store;
use TCG\Voyager\Models\Post;

class HomeController extends Controller
{
    public function __invoke()
    {
        $categories = Category::homepage()->take(8);
        $articles = Post::published()->whereFeatured(true)->select('slug', 'image', 'excerpt', 'title')->latest('updated_at')->take(4)->get()->toArray();
        $slides = Slide::published()->orderBy('order')->get();
        $popular = Store::published()->wherePopularStore(true)->select('slug', 'logo', 'name')->latest('updated_at')->take(12)->get()->toArray();
        return view('frontend.' . config('nextgen.theme') . '.home', compact(['categories', 'popular', 'articles', 'slides']));
    }
}
