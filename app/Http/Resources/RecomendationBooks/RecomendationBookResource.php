<?php

namespace App\Http\Resources\RecomendationBooks;

use App\Http\Resources\Books\BookResource;
use App\Http\Resources\Reviews\ReviewCollection;
use App\Http\Resources\Reviews\ReviewResource;
use Illuminate\Http\Resources\Json\JsonResource;

class RecomendationBookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'book' => new BookResource($this->book),
            'reviews' => new ReviewCollection($this->whenLoaded('review')),
        ];
    }
}
