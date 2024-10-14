<?php

namespace App\Services\Article;

use App\Repositories\Article\ArticleRepositoryInterface;
use Illuminate\Support\Facades\Cache;

class ArticleService implements ArticleServiceInterface
{


    private ArticleRepositoryInterface $articleRepository;

    public function __construct(ArticleRepositoryInterface $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    public function index(array $inputs)
    {
        $params['per_page'] = $inputs['per_page'] ?? 15;

        $params['date_time'] = $inputs['date_time'] ?? now()->subDay()->format('Y-m-d H:i:s');

        $input = implode(':', $inputs);
        return Cache::remember(trim($input,':'), 3600, function () use ($params) {
            return $this->articleRepository->index($params);
        });
    }


}
