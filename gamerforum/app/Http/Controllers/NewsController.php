<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::all();
        return view('home', compact('news'));
    }

    public function show($id)
    {
        $news = News::findOrFail($id);
        return view('news.show', compact('news'));
    }

    public function create()
    {
        return view('news.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'cover_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'content' => 'required|string',
            'published_at' => 'required|date',
        ]);

        $imagePath = $request->file('cover_image')->store('images', 'public');

        News::create([
            'title' => $request->title,
            'cover_image' => $imagePath,
            'content' => $request->content,
            'published_at' => $request->published_at,
        ]);

        return redirect('/')->with('success', 'News created successfully!');
    }

    public function edit($id)
    {
        $news = News::findOrFail($id);
        return view('news.edit', compact('news'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'cover_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'content' => 'required|string',
            'published_at' => 'required|date',
        ]);

        $news = News::findOrFail($id);

        if ($request->hasFile('cover_image')) {
            $imagePath = $request->file('cover_image')->store('images', 'public');
            $news->cover_image = $imagePath;
        }

        $news->title = $request->title;
        $news->content = $request->content;
        $news->published_at = $request->published_at;
        $news->save();

        return redirect('/')->with('success', 'News updated successfully!');
    }

    public function destroy($id)
    {
        $news = News::findOrFail($id);
        $news->delete();
        return redirect('/')->with('success', 'News deleted successfully!');
    }
}
