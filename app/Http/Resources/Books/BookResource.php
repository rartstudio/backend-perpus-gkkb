<?php

namespace App\Http\Resources\Books;

use App\Http\Resources\Authors\AuthorResource;
use App\Http\Resources\CategoriesBook\CategoriesBookResource;
use App\Http\Resources\Publishers\PublishersResource;
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
            'categories' => new CategoriesBookResource($this->categories_book),
            'title' => $this->title,
            'description' => $this->description,
            'author' => new AuthorResource($this->author),
            'publisher' => new PublishersResource($this->publisher),
            'cover' => $this->cover,
            'qty' => $this->qty,

        ];
    }
}
