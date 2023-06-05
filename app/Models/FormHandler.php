<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class FormHandler extends Model
{
    use HasFactory;
    protected $fillable = ['type', 'payload'];

    public function form(): HasOne
    {
        return $this->HasOne(Form::class);
    }
}
