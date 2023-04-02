<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $query = Post::with('category','sub_category' ,'tag', 'user')->where('is_approved', 1)->where('status', 1);
        $posts = $query->latest()->take(5)->get();
        $slider_posts = $query->inRandomOrder()->take(6)->get();
        return view('frontend.modules.index', compact('posts', 'slider_posts'));
    }

    public function single()
    {
        return view('frontend.modules.single');
    }

    public function allPost()
    {
        $posts = Post::with('category','sub_category', 'tag', 'user')->where('is_approved', 1)->where('status', 1)->latest()->paginate(10);
        $title= 'All Post';
        $sub_title= 'View All Post List';
        return view('frontend.modules.all_post', compact('posts', 'title', 'sub_title'));
    }

    public function search(Request $request)
    {
        $posts =Post::with('category','sub_category', 'tag', 'user')
            ->where('is_approved', 1)
            ->where('status', 1)
            ->where('title', 'like', '%'.$request->input('search').'%')
            ->latest()
            ->paginate(10);
        $title= 'View Search Result';
        $sub_title= $request->input('search');
        return view('frontend.modules.all_post', compact('posts','title', 'sub_title'));
    }

    public function category($slug){
        $category= Category::where('slug',$slug)->first();
        if ($category){
            $posts =Post::with('category','sub_category', 'tag', 'user')
                ->where('is_approved', 1)
                ->where('status', 1)
                ->where('category_id',$category->id)
                ->latest()
                ->paginate(10);
        }
        $title= $category->name;
        $sub_title= 'Post By Category';
        return view('frontend.modules.all_post', compact('posts','title', 'sub_title'));

    }

    public function subCategory($slug, $sub_slug)
    {
        $sub_category = SubCategory::where('slug', $sub_slug)->first();
        if ($sub_category) {
            $posts = Post::with('category', 'sub_category', 'tag', 'user')
                ->where('is_approved', 1)
                ->where('status', 1)
                ->where('sub_category_id', $sub_category->id)
                ->latest()
                ->paginate(10);
        }
        $title = $sub_category->name;
        $sub_title = 'Post By Sub Category';
        return view('frontend.modules.all_post', compact('posts', 'title', 'sub_title'));

    }

}
