<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AllResource extends JsonResource
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
          'posts' => PostResource::collection($this->posts),
          'categories' => CategoryResource::collection($this->categories),

//          'categories' => $this->categories
        ];
    }
}
