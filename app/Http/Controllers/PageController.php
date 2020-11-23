<?php

namespace App\Http\Controllers;

use App\Category;
use TCG\Voyager\Models\Page;
use TCG\Voyager\Models\Post;

class PageController extends Controller
{
    public function __invoke($slug) {

        $categories = Category::homepage()->take(8);

        if ($category = Category::whereSlug($slug)->first()) {
            $posts = Post::published()->whereCategoryId($category->id)->paginate(9);
            return view('frontend.' . config('nextgen.theme') . '.category.show', compact(['posts', 'category', 'categories']));
        } elseif($page = Page::whereSlug($slug)->first()) {
            return view('frontend.'. config('nextgen.theme') . '.page.show', compact(['page', 'categories']));
        } elseif($post = Post::whereSlug($slug)->first()) {
            $related = Post::published()->whereCategoryId($post->category->id)->where('id', '<>', $post->id)->take(5)->get();
            return view('frontend.' . config('nextgen.theme') . '.blog.show', compact(['post', 'related', 'categories']));
        } else {
            abort(404);
        }

    }
}
