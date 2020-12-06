<?php

namespace App\Widgets;

use App\Store;
use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Models\Post;
use TCG\Voyager\Widgets\BaseDimmer;

class PostDimmer extends BaseDimmer
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $count = Post::count();
        $string = "posts";

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-list',
            'title'  => $count . " " . ucfirst($string),
            'text'   => "",
            'button' => [
                'text' => "View all $string",
                'link' => route('voyager.posts.index'),
            ],
            'image' => voyager_asset('images/widget-backgrounds/02.jpg'),
        ]));
    }

    /**
     * Determine if the widget should be displayed.
     *
     * @return bool
     */
    public function shouldBeDisplayed()
    {
        return Auth::user()->can('browse', Voyager::model('Post'));
    }
}
