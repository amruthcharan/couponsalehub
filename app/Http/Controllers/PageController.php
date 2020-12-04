<?php

namespace App\Http\Controllers;

use App\Category;
use App\Coupon;
use App\Redirect;
use App\Store;
use TCG\Voyager\Models\Page;
use TCG\Voyager\Models\Post;

class PageController extends Controller
{
    public function __invoke($slug)
    {
        if ($redirect = Redirect::whereSlug($slug)->first()) {
            return redirect($redirect->redirect_to, 301);
        }
        $categories = Category::homepage()->take(8);

        if ($category = Category::whereSlug($slug)->first()) {
            $posts = Post::published()->whereCategoryId($category->id)->with('category')->latest('created_at')->paginate(5);
            $stores = Store::whereCategoryId($category->id)->select('slug', 'name', 'logo')->paginate(8, [], 'stores');
            return view('frontend.' . config('nextgen.theme') . '.category.show', compact(['posts', 'category', 'categories', 'stores']));
        } elseif ($page = Page::whereSlug($slug)->whereStatus(Page::STATUS_ACTIVE)->first()) {
            return view('frontend.' . config('nextgen.theme') . '.page.show', compact(['page', 'categories']));
        } elseif ($post = Post::whereSlug($slug)->first()) {
            $related = Post::published()->whereCategoryId($post->category->id)->where('id', '<>', $post->id)->take(3)->get();
            return view('frontend.' . config('nextgen.theme') . '.blog.show', compact(['post', 'related', 'categories']));
        } elseif ($store = Store::whereSlug($slug)
            ->with(['headings' => function ($q) {
                $q->with(['coupons' => function ($q) {
                    $q->active();
                }]);
            }, 'coupons' => function ($q) {
                $q->active();
            }])->first()) {
            $selected = Coupon::with('store')->find(request('coupon'));
            return view('frontend.' . config('nextgen.theme') . '.store.show', compact(['store', 'categories', 'selected']));
        } else {
            abort(404);
        }

    }
}
