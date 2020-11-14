<?php

namespace App\Http\Controllers;

use TCG\Voyager\Models\Category;
use TCG\Voyager\Models\Post;

class CategoryController extends Controller
{
    public function __invoke($slug) {
        $category = Category::whereSlug($slug)->first();
        $popular = Post::published()->whereFeatured(true)->take(5)->get();

        if ($category) {
            $posts = Post::published()->whereCategoryId($category->id)->paginate(5);
            return view('frontend.' . config('nextgen.theme') . '.category', compact(['posts', 'popular', 'category']));
        } elseif($post = Post::whereSlug($slug)->first()) {
            $related = Post::published()->take(2)->get();
            return view('frontend.' . config('nextgen.theme') . '.single-blog', compact(['post', 'popular', 'related']));
        } else {
            abort(404);
        }

    }
}
