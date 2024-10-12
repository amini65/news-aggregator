<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Article\ArticleSearchRequest;
use App\Http\Resources\ArticleResource;
use App\Models\Article;
use App\Repositories\Article\ArticleRepositoryInterface;
use Illuminate\Http\Response;

class ArticleController extends Controller
{

    private ArticleRepositoryInterface $articleRepository;

    public function __construct(ArticleRepositoryInterface $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }


    /**
     * @param ArticleSearchRequest $request
     * @return JsonResponse
     */
    public function index(ArticleSearchRequest $request)
    {


        $params=$request->all();
        $params['per_page'] =$request->get('per_page',15);

        $params['date_time']= $request->get('date_time',now()->subDay()->format('Y-m-d H:i:s'));

        $articles=$this->articleRepository->index($params);

        return Response::success(ArticleResource::collection($articles),__('success_response'));

    }

    public function show(Article $article)
    {

        return Response::success(ArticleResource::make($article),__('success_response'));
    }


}
