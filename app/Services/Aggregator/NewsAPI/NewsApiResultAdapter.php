<?php

namespace App\Services\Aggregator\NewsAPI;

use App\Services\Aggregator\Interfaces\AdapterInterface;

class NewsApiResultAdapter implements AdapterInterface
{


    public function prepareResult($result)
    {
        $response=json_decode($result,true);


        foreach($response['articles'] as $key=>$item){

            $news[$key]['source']='newsApi';
            $news[$key]['category']='sports';
            $news[$key]['author']=$item['author'];
            $news[$key]['title']=$item['title'];
            $news[$key]['description']=$item['description'];
            $news[$key]['image']=$item['urlToImage'];
            $news[$key]['content']=$item['content'];
            $news[$key]['published_at']=$item['publishedAt'] ?? null;
        }

        return $news;

    }

}
