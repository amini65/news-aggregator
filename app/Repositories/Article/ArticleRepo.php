<?php

namespace App\Repositories\Article;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleRepo  implements ArticleRepositoryInterface
{

    private $model;
    public function __construct(Article $article)
    {
        $this->model = $article;
    }

    public function create(array $inputs): mixed
    {
        return $this->model
            ->newQuery()
            ->create($inputs);
    }

    public function index($inputs): mixed
    {

        return $this->model->newQuery()
            ->when(!empty($inputs['keyword']), function ($query)use ($inputs) {
                $query->where('title', $inputs['keyword'])
                     ->where('published_at','>=', $inputs['date_time']);
            })
            ->when(!empty($inputs['category']), function ($query)use ($inputs) {
                $query->whereHas('category', function ($query) use($inputs) {
                    $query->where('name', $inputs['category']);
                });
            })
            ->when(!empty($inputs['source']), function ($query)use ($inputs) {
                $query->whereHas('source', function ($query) use($inputs) {
                    $query->where('name', $inputs['source']);
                });
            })
            ->paginate($inputs['per_page']);


    }

}
