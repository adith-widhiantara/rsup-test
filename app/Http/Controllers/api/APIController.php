<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class APIController extends Controller
{
    public function index(): JsonResponse
    {
        $articles = Article::all();

        return response()->json($articles);
    }

    public function update(Request $request, Article $article): JsonResponse
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

        return response()->json($article);
    }

    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category' => 'required|string|max:255',
            'file_path' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $article = Article::query()
            ->create([
                'title' => $request->get('title'),
                'content' => $request->get('content'),
                'category' => $request->get('category'),
                'file_path' => $request->file('file_path') ? $request->file('file_path')->store('articles') : null,
                'author_id' => auth()->id(),
            ]);

        return response()->json($article, 201);
    }

    public function destroy(Article $article): JsonResponse
    {
        $article->delete();

        return response()->json(null, 204);
    }
}
