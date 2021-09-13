<?php

namespace App\Http\Controllers;

use App\Http\Controllers\traits\post\AllPosts;
use App\Http\Controllers\traits\post\crud\Create;
use App\Http\Controllers\traits\post\PostImageDownload;
use App\Http\Controllers\traits\post\view\CreateView;
use App\Http\Controllers\traits\post\crud\Delete;
use App\Http\Controllers\traits\post\crud\Force;
use App\Http\Controllers\traits\post\crud\Restore;
use App\Http\Controllers\traits\post\crud\Search;
use App\Http\Controllers\traits\post\crud\Update;
use App\Http\Controllers\traits\post\view\TrashView;
use App\Http\Controllers\traits\post\view\UpdateView;
use App\Models\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

/**
 * Class PostController
 * @package App\Http\Controllers
 */
class PostController extends Controller
{
    // Traits
    use Create, Delete, Force, Restore, Update, Search, AllPosts, PostImageDownload;
    use TrashView, UpdateView, CreateView;

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $posts = Post::all();
        return view('components.public.index')
            ->with('posts', $posts->random(min([5, $posts->count()])))
            ->with('title', 'public');
    }

    /**
     * @param int $id
     * @return Application|Factory|View
     */
    public function viewpost($id = -1)
    {
        $post = Post::query()->findOrFail($id);

        return view('components.post.postview')
            ->with('post', $post)
            ->with('title', 'post - view');
    }
}
