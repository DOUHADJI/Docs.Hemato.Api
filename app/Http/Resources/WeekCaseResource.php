<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Resources\Json\JsonResource;

class WeekCaseResource extends JsonResource
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
            "slug" => $this->slug,
            "resume" => $this->resume,
            "content" => $this->content,
            "image_path" => $this->image_path,
            "video_path" => $this->video_path,
            "image" => Storage::url($this->image_path) ,
        ];
    }
}
