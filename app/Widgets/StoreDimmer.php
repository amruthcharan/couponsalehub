<?php

namespace App\Widgets;

use App\Store;
use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Widgets\BaseDimmer;

class StoreDimmer extends BaseDimmer
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
        $count = Store::count();
        $string = "stores";

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-list',
            'title'  => "{$count} Stores",
            'text'   => "",
            'button' => [
                'text' => "View all $string",
                'link' => route('voyager.stores.index'),
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
        $store = Store::first();
        return Auth::user()->can('browse', $store);
    }
}
