<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Process extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "content",
        "image_path",
        "video_path",
        "slug",
        "step_id"
    ];

    public function step(): BelongsTo
    {
        return $this->belongsTo(Step::class, "step_id");
    }
}
