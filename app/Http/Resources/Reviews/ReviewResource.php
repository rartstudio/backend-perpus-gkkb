<?php

namespace App\Http\Resources\Reviews;

use App\Http\Resources\Books\BookResource;
use App\Http\Resources\User\ImageResource;
use App\Http\Resources\User\UserResource;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResource extends JsonResource
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
            'user' => new ImageResource($this->user),
            'comment' => $this->comment,
            'rating' => $this->rating,
            'book' => new BookResource($this->book),
            'last' => $this->created_at->diffForHumans()
        ];
    }
}
