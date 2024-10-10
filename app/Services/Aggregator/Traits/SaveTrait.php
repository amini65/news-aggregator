<?php

namespace App\Services\Aggregator\Traits;

use App\Models\Article;
use App\Repositories\ArticleRepo;
use App\Repositories\AuthorRepo;
use App\Repositories\CategoryRepo;

trait SaveTrait
{
    public function save()
    {
        // TODO refactor this code

        $categoryRepo= new CategoryRepo();
        $categories=$categoryRepo->all();

        $autherRepo=new AuthorRepo();
        $autheres=$autherRepo->all();

        $articleRepo=new ArticleRepo();
        $autheres=$autherRepo->all();
        foreach ($this->result as $result) {

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
        dd($this->result);
//        Article::query()
//            ->create($this->result);
    }
}
