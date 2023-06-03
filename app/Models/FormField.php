<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class FormField extends Model
{
    use HasFactory;

    protected $casts = [
        'params' => 'array',
    ];

    public function form(): HasOne
    {
        return $this->HasOne(Form::class);
    }
}
