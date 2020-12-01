<?php

namespace App\Http\Controllers;

use App\Category;
use App\Store;
use TCG\Voyager\Models\Post;

class ReviewsController extends Controller
{
    public function __invoke()
    {
        $top = Store::whereTopReview(true)->select('slug', 'feature_image', 'name')->latest('updated_at')->paginate(8);
        $popular = Store::wherePopularStore(true)->select('slug', 'logo', 'name')->latest('updated_at')->paginate(12);
        return view('frontend.' . config('nextgen.theme') . '.reviews.index', compact(['top', 'popular']));
    }
}
