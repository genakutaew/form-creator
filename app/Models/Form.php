<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Form extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'name', 'submit_text'];

    public function fields(): HasMany
    {
        return $this->hasMany(FormField::class);
    }

    public function handler(): HasOne
    {
        return $this->hasOne(FormHandler::class);
    }
}
