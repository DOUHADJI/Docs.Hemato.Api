<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Thematic extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "slug"
      ];


    public function courses() : HasMany
    {
        return $this-> hasMany(Course::class, "thematic_id");
    }
}
