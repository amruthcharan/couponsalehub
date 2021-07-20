<?php

namespace App\Http\Controllers;

use App\Store;
use Illuminate\Http\Request;
use TCG\Voyager\Models\Post;

class StoreController extends Controller
{
    public function publish($id) {
        $store = Store::find($id);
        if ($store->is_enabled) {
            $store->update(['is_enabled' => false]);
            $status = false;
        } else {
            $store->update(['is_enabled' => true]);
            $status = true;
        }
        return redirect()->back()->with([
            'message'    => 'Selected store has been ' . ($status ? 'published' : 'unpublished'),
            'alert-type' => $status ? 'success' : 'warning',
        ]);
    }

    public function home($id) {
        $store = Store::find($id);
        if ($store->popular_store) {
            $store->update(['popular_store' => false]);
            $status = false;
        } else {
            $store->update(['popular_store' => true]);
            $status = true;
        }
        return redirect()->back()->with([
            'message'    => 'Selected store has been ' . ($status ? 'added to ' : 'removed from') . 'Homepage',
            'alert-type' => $status ? 'success' : 'warning',
        ]);
    }
    
    public function featured($id) {
        $store = Post::find($id);
        if ($store->featured) {
            $store->update(['featured' => false]);
            $status = false;
        } else {
            $store->update(['featured' => true]);
            $status = true;
        }
        return redirect()->back()->with([
            'message'    => 'Selected store has been ' . ($status ? 'marked as ' : 'removed as') . 'Featured',
            'alert-type' => $status ? 'success' : 'warning',
        ]);
    }
}
