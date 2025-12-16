<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Post;
use App\Models\Contact;
class PageController extends Controller
{
    public function about()
    {
        $page = Page::all();
        return view('about', compact('page'));
    }
    public function contact()
    {
        $contacts = Contact::orderBy('id', 'desc')->get();
        return view('contact', compact('contacts'));
    }

    public function blog()
    {
        $posts = Post::where('status', 1)->latest()->paginate(6);
        return view('blog.index', compact('posts'));
    }

    public function blogDetail(Post $post)
    {
        return view('blog.show', compact('post'));
    }
}
