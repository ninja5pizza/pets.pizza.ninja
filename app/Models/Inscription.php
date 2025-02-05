<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{
    const UPDATED_AT = null;

    protected $fillable = [
        'inscription_id',
        'parent_id',
        'name',
        'created_at_block',
    ];
}
