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
        $authorRepo = resolve(AuthorRepoInterface::class);

        $articleRepo = resolve(ArticleRepositoryInterface::class);
        foreach ($this->result as $result) {

            if (empty($result['category'])) {
                $result["category"] = "default";
            }

            $category = $categoryRepo->create($result['category']);

            if (empty($result['author'])) {
                $result["author"] = "default";
            }
            $author = $authorRepo->create($result['author']);

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
