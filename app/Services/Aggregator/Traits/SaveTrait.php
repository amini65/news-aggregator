<?php

namespace App\Services\Aggregator\Traits;

use App\Repositories\Article\ArticleRepositoryInterface;
use App\Repositories\Author\AuthorRepoInterface;
use App\Repositories\Category\CategoryRepoInterface;

trait SaveTrait
{
    public function save()
    {

        $categoryRepo= resolve(CategoryRepoInterface::class) ;
        $categories=$categoryRepo->getBySourceName($this->sourceName);

        $authorRepo= resolve(AuthorRepoInterface::class) ;
        $authors=$authorRepo->all();

        $articleRepo= resolve(ArticleRepositoryInterface::class);
        foreach ($this->result as $result) {

            if(!in_array($result['category'],$categories->toArray())){
                $categoryRepo->create($result['category']);
            }
            if(!in_array($result['author'],$authors->toArray())){
                $authorRepo->create($result['author']);
            }
            $articleRepo->create([
                'source'=>$this->sourceName,
                'category'=>$result['category'],
                'author'=>$result['author'],
                'title'=>$result['title'],
                'description'=>$result['description'],
                'image'=>$result['image'],
                'content'=>$result['content'],
                'published_at'=>$result['publishedAt']
            ]);


        }

    }
}
