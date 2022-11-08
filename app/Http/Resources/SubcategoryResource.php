<?php

namespace App\Http\Resources;

use App\Models\Subcategory;
use App\Models\SubcategoryParameter;
use Illuminate\Http\Resources\Json\JsonResource;

class SubcategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $subcategory_parameters = SubcategoryParameter::where('subcategory_id', $this->id)->get();
        return [
            'name' => $this->name,
            'subcategory_parameters' => SubcategoryParameterResource::collection($subcategory_parameters),
        ];
    }
}
