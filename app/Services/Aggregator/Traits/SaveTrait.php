<?php

namespace App\Services\Aggregator\Traits;

use App\Repositories\Article\ArticleRepositoryInterface;
use App\Repositories\Author\AuthorRepoInterface;
use App\Repositories\Category\CategoryRepoInterface;
use App\Repositories\Source\SourceRepoInterface;
use Carbon\Carbon;

trait SaveTrait
{
    public function save()
    {

        $sourceRepo = resolve(SourceRepoInterface::class);
        $source = $sourceRepo->getByName($this->sourceName);


        $categoryRepo = resolve(CategoryRepoInterface::class);
        $categories = $categoryRepo->getBySourceName($this->sourceName);

        $authorRepo = resolve(AuthorRepoInterface::class);
        $authors = $authorRepo->all();

        $articleRepo = resolve(ArticleRepositoryInterface::class);
        foreach ($this->result as $result) {

            if (empty($result['category'])) {
                $result["category"] = "default";
            }
            if (!in_array($result['category'], $categories->toArray())) {

                $category = $categoryRepo->create($result['category']);
            }
            if (empty($result['author'])) {
                $result["author"] = "default";
            }
            if (!in_array($result['author'], $authors->toArray())) {
                $author = $authorRepo->create($result['author']);
            }
//            dd([
//                'source_id'=>$source->id,
//                'category_id'=>$category->id,
//                'author_id'=>$author->id,
//                'title'=>$result['title'],
//                'description'=>$result['description'],
//                'image'=>$result['image'],
//                'content'=>$result['content'],
//                'published_at'=>$result['published_at']
//            ]);
            $articleRepo->create([
                'source_id' => $source->id,
                'category_id' => $category->id,
                'author_id' => $author->id,
                'title' => $result['title'],
                'description' => $result['description'],
                'image' => $result['image'],
                'content' => $result['content'],
                'published_at' => Carbon::create($result['published_at'])->format('Y-m-d H:i:s')
            ]);


        }

    }
}
