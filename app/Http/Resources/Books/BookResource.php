<?php

namespace App\Http\Resources\Books;

use App\Http\Resources\Authors\AuthorResource;
use App\Http\Resources\CategoriesBook\CategoriesBookResource;
use App\Http\Resources\Publishers\PublishersResource;
use App\Http\Resources\Reviews\ReviewResource;
use App\Http\Resources\Stock\StockMasterResource;
use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
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
            'id' => $this->id,
            'categories' => new CategoriesBookResource($this->categories_book),
            'title' => $this->title,
            'slug' => $this->slug,
            'stock' => new StockMasterResource($this->stock),
            'description' => $this->description,
            'author' => new AuthorResource($this->author),
            'publisher' => new PublishersResource($this->publisher),
            'reviews' => ReviewResource::collection($this->whenLoaded('review')),
            'cover' => $this->cover,
            'is_recommendation_user' => $this->is_recommendation_user,
            'qty' => $this->qty
        ];
    }
}
