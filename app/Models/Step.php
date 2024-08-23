<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Ramsey\Uuid\Type\Integer;

class Step extends Model
{
    use HasFactory;

    public function processes(): HasMany
    {
        return $this->hasMany(Process::class, "step_id");
    }

   
}
