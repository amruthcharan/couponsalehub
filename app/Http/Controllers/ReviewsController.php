<?php

namespace App\Http\Controllers;

use App\Category;
use App\Store;
use TCG\Voyager\Models\Post;

class ReviewsController extends Controller
{
    public function __invoke()
    {
        $stores = Store::published()->select('slug', 'feature_image', 'name')->latest('updated_at')->paginate(16);
        return view('frontend.' . config('nextgen.theme') . '.reviews.index', compact('stores'));
    }
}
