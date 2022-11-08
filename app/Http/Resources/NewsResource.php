<?php

namespace App\Http\Resources;
use App\Models\NewsCategory;
use App\Models\Category;
use App\Http\Resources\CategoryResource;

use Illuminate\Http\Resources\Json\JsonResource;

class NewsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $newsCategories = NewsCategory::where('news_id', $this->id)->get();
        $categories = [];
        foreach ($newsCategories as $newsCategory) {
            $categories[] = Category::where('id', $newsCategory['category_id'])->first();        
        }
        return [
            'id' => $this->id,
            'title' => $this->title,
            'preview' => $this->preview,
            'text' => $this->text,
            'author_id' => $this->author_id,
            'created_at' => $this->created_at,
            'categories' => CategoryResource::collection($categories),
        ];
    }
}
