<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id"=> 1,
            "source"=>$this->source,
            "category"=> $this->category,
            "author"=> $this->author,
            "title"=> $this->title,
            "description"=> $this->description,
            "image"=> $this->image,
            "content"=>$this->content,
            "published_at"=>Carbon::create($this->published_at)->format('Y-m-d H:i:s'),
            "created_at"=> Carbon::create($this->created_at)->format('Y-m-d H:i:s'),
            "updated_at"=>Carbon::create($this->updated_at)->format('Y-m-d H:i:s')
        ];
    }
}
