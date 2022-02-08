<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function list(Request $request): \Illuminate\Http\JsonResponse
    {
        $articles = Article::orderByDesc('date')
            ->when($request->get('categoryId'), function ($query) use ($request) {
                $query
                    ->when(is_array($request->get('categoryId')), function ($q) use ($request) {
                        $q->whereIn('category_id', $request->get('categoryId'));
                    })
                    ->when(is_numeric($request->get('categoryId')), function ($q) use ($request) {
                        $q->where('category_id', '=', $request->get('categoryId'));
                    });
            })
            ->when($request->get('tags'), function ($query) use ($request) {
                $query->whereTag($request->get('tags'));
            })
            ->with(['category', 'tags'])
            ->paginate($request->get('perPage') ?? self::$perPage);

        return $this->success([
            'items' => $articles
        ]);
    }

    public function get($slug): \Illuminate\Http\JsonResponse
    {
        $article = Article::whereSlug($slug)->with(['category', 'tags'])->first();

        if (empty($article)) {
            return $this->error(__('Статья не найдена'), ['slug' => $slug], 404);
        }

        return $this->success([
            'item' => $article
        ]);
    }

    public function tags(): \Illuminate\Http\JsonResponse
    {
        return $this->success([
            'items' => Article::allTags()->get()
        ]);
    }

    public function categories(): \Illuminate\Http\JsonResponse
    {
        return $this->success([
            'items' => Category::whereHas('articles')->get()
        ]);
    }
}
