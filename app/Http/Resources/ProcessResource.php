<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProcessResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "title" => $this->title,
            "content" =>  $this->content, // json_encode($this->content),
            "slug" => $this->slug,
            "image" => $this->image_path,
            "video_path" => $this->video_path,
        ];
    }
}




