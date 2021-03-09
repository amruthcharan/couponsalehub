<?php

namespace App\Http\Controllers;

use App\Category;
use App\Store;
use TCG\Voyager\Models\Post;

class SearchController extends Controller
{
    public function search() {
        $search = request()->get('search');
        $cats = Category::where('name', 'like', '%'. $search .'%')->pluck('id');

        $posts = Post::published()
                        ->where('body', 'like', '%'. $search .'%')
                        ->orWhere('title', 'like', '%'. $search .'%')
                        ->orWhereIn('category_id', $cats)
                        ->with('category', 'authorId')
                        ->paginate(10);
        $categories = Category::homepage();
        $stores = Store::where('name', 'like', '%'. $search .'%')
                        ->orWhereIn('category_id', $cats)
                        ->published()
                        ->select('name', 'slug', 'logo')
                        ->paginate(10, [], 'stores');
        return view('frontend.' . config('nextgen.theme') . '.search.show', compact(['search', 'posts', 'categories', 'stores']));
    }
}
