<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Article\ArticleSearchRequest;
use App\Http\Resources\ArticleResource;
use App\Models\Article;
use Illuminate\Http\Response;

class ArticleController extends Controller
{

    public function index(ArticleSearchRequest $request)
    {

        $articles = \App\Services\Article\Article::index($request->all());

        return Response::success(ArticleResource::collection($articles), __('success_response'));

    }

    public function show(Article $article)
    {

        return Response::success(ArticleResource::make($article), __('success_response'));
    }


}
