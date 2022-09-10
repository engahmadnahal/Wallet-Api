<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

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
        return [
            'id' => $this->id,
            'name' => $this->name,
            'image' => Storage::url($this->image),
            'sub_categories' => $this->subCategory->map(function($e){
                return [
                    'id' => $e->id,
                    'name' => $e->name,
                    'image' => Storage::url($e->image)
                ];
            })
        ];
    }
}
