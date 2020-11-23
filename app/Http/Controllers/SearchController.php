<?php

namespace App\Http\Controllers;

use App\Category;
use TCG\Voyager\Models\Post;

class SearchController extends Controller
{
    public function search() {
        $search = request()->get('search');
        $posts = Post::published()
                        ->where('body', 'like', '%'. $search .'%')
                        ->orWhere('title', 'like', '%'. $search .'%')
                        ->paginate(10);
        $categories = Category::homepage();
        return view('frontend.' . config('nextgen.theme') . '.search.show', compact(['search', 'posts', 'categories']));
    }
}
