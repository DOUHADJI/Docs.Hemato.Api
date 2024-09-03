<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "content",
        "image_path",
        "video_path",
        "slug",
        "thematic_id"
    ];

    public function thematic(): BelongsTo
    {
        return $this->belongsTo(Thematic::class, "thematic_id");
    }
}
