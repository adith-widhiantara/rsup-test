<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View|Application|Factory
    {
        $articles = Article::all();

        return view('articles.index', compact('articles'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article): View|Application|Factory
    {
        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article): View|Application|Factory
    {
        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article): RedirectResponse
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category' => 'required|string|max:255',
            'file_path' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $article->update([
            'title' => $request->get('title'),
            'content' => $request->get('content'),
            'category' => $request->get('category'),
            'file_path' => $request->file('file_path') ? $request->file('file_path')->store('articles') : null,
        ]);

        return redirect()
            ->route('articles.index')
            ->with('success', 'Article updated successfully.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category' => 'required|string|max:255',
            'file_path' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        Article::query()
            ->create([
                'title' => $request->get('title'),
                'content' => $request->get('content'),
                'category' => $request->get('category'),
                'file_path' => $request->file('file_path') ? $request->file('file_path')->store('articles') : null,
                'author_id' => auth()->id(),
            ]);

        return redirect()
            ->route('articles.index')
            ->with('success', 'Article created successfully.');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View|Application|Factory
    {
        return view('articles.create');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article): RedirectResponse
    {
        $article->delete();

        return redirect()
            ->route('articles.index')
            ->with('success', 'Article deleted successfully.');
    }
}
