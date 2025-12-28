<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate(10);
        return view('admin.posts.blog', compact('posts'));
    }

    public function create()
    {
        return view('admin.posts.create');
    }


    // trong method store()
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|url',
            'excerpt' => 'nullable|string',
            'content' => 'required|string',
            'status' => 'required|boolean',
        ]);

        // Tạo slug từ title
        $data['slug'] = Str::slug($data['title']);

        Post::create($data);

        return redirect()->route('admin.posts.index')->with('success', 'Post created successfully.');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
{
    $data = $request->validate([
        'title' => 'required|string|max:255',
        'image' => 'nullable|url',
        'excerpt' => 'nullable|string',
        'content' => 'required|string',
        'status' => 'required|boolean',
    ]);

    $data['slug'] = Str::slug($data['title']); // cập nhật slug

    $post->update($data);

    return redirect()->route('admin.posts.index')->with('success', 'Post updated successfully.');
}

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index')->with('success', 'Post deleted successfully.');
    }
}
