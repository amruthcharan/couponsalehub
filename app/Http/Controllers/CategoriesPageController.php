<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoriesPageController extends Controller
{
    public function __invoke()
    {
        $categories = Category::all();
        return view('frontend.' . config('nextgen.theme') . '.category.index', compact('categories'));
    }
}
