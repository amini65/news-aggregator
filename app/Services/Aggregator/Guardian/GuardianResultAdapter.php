<?php

namespace App\Services\Aggregator\Guardian;

use App\Services\Aggregator\Interfaces\AdapterInterface;

class GuardianResultAdapter implements AdapterInterface
{


    public function prepareResult($result)
    {

        $response=json_decode($result,true);


        foreach($response['response']['results'] as $key=>$item){
            $news[$key]['source']='guardian';
            $news[$key]['category']=$item['type'];
            $news[$key]['author']=$item['sectionName'];
            $news[$key]['title']=$item['webTitle'];
            $news[$key]['description']=$item['webUrl'];
            $news[$key]['image']=$item['urlToImage']?? '';
            $news[$key]['content']=$item['webUrl'];
            $news[$key]['published_at']=$item['webPublicationDate'];
        }

        return $news;

    }

}
