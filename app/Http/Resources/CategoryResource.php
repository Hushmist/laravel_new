<?php

namespace App\Http\Resources;

use App\Models\Subcategory;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $subcategories = Subcategory::where('category_id', $this->id)->get();
        return [
            'id' => $this->id,
            'name' => $this->name,
            'subcategories' => SubcategoryResource::collection($subcategories),
            'created_at' => $this->created_at,
        ];
    }
}
