<?php

namespace App\Http\Controllers;

use App\Category;
use App\Store;
use TCG\Voyager\Models\Post;

class HomeController extends Controller
{
    public function __invoke()
    {
        $categories = Category::homepage()->take(8);
        $articles = Post::published()->select('slug', 'image', 'excerpt', 'title')->latest('updated_at')->take(12)->get()->toArray();
        $right = array_slice($articles,0,2);
        $slider = array_slice($articles,2, 4);
        $posts = array_slice($articles,4, 12);
        $top = Store::published()->whereTopReview(true)->select('slug', 'feature_image', 'name')->latest('updated_at')->take(8)->get()->toArray();
        $popular = Store::published()->wherePopularStore(true)->select('slug', 'logo', 'name')->latest('updated_at')->take(12)->get()->toArray();
        return view('frontend.' . config('nextgen.theme') . '.home', compact(['right', 'slider', 'categories', 'top', 'popular', 'posts']));
    }
}
