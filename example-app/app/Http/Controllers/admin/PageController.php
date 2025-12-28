<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function __construct()
    {
        // Chỉ cho phép truy cập khi đã đăng nhập, ngoại trừ show
        $this->middleware('auth')->except('show');
    }

    /**
     * Hiển thị danh sách tất cả Page
     */
    public function index()
    {
        $pages = Page::all();
        return view('admin.pages.page', compact('pages'));
    }

    /**
     * Hiển thị form tạo Page mới
     */
    public function create()
    {
        return view('admin.pages.create');
    }

    /**
     * Lưu Page mới vào database
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:pages,slug',
            'content' => 'required|string',
            'status' => 'required|boolean',
        ]);

        // Tự động tạo slug nếu trống
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }

        Page::create($data);

        return redirect()->route('admin.pages.index')
                         ->with('success', 'Page created successfully!');
    }

    /**
     * Hiển thị form chỉnh sửa Page
     */
    public function edit(Page $page)
    {
        return view('admin.pages.edit', compact('page'));
    }

    /**
     * Cập nhật Page đã có
     */
    public function update(Request $request, Page $page)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:pages,slug,' . $page->id,
            'content' => 'required|string',
            'status' => 'required|boolean',
        ]);

        // Tự động tạo slug nếu trống
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }

        $page->update($data);

        return redirect()->route('admin.pages.index')
                         ->with('success', 'Page updated successfully!');
    }

    /**
     * Xóa Page
     */
    public function destroy(Page $page)
    {
        $page->delete();
        return back()->with('success', 'Page deleted successfully!');
    }

    /**
     * Hiển thị Page cho người dùng (frontend)
     */
    public function show($slug)
    {
        $page = Page::where('slug', $slug)->firstOrFail();
        return view('pages.show', compact('page'));
    }
}
