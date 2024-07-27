<?php
namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::all();
        return view('blogs.index', compact('blogs'));
    }

    public function create()
    {
        return view('blogs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        $blog = new Blog();
        $blog->title = $request->input('title');
        $blog->content = $request->input('content');
        $blog->user_id = Auth::id();
        $blog->save();

        return redirect()->route('home')->with('success', 'Blog created successfully.');
    }

    public function edit($id)
    {
        $blog = Blog::findOrFail($id);

        if ($blog->user_id !== Auth::id()) {
            return redirect()->route('home')->with('error', 'You are not authorized to edit this blog.');
        }

        return view('blogs.edit', compact('blog'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        $blog = Blog::findOrFail($id);

        if ($blog->user_id !== Auth::id()) {
            return redirect()->route('home')->with('error', 'You are not authorized to update this blog.');
        }

        $blog->title = $request->input('title');
        $blog->content = $request->input('content');
        $blog->save();

        return redirect()->route('home')->with('success', 'Blog updated successfully.');
    }

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);

        if ($blog->user_id !== Auth::id()) {
            return redirect()->route('home')->with('error', 'You are not authorized to delete this blog.');
        }

        $blog->delete();

        return redirect()->route('home')->with('success', 'Blog deleted successfully.');
    }
}
