<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Punishment;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Site extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'url',
        'punishment_id'
    ];

    public function punishment()
    {
        return $this->HasOne(Punishment::class);
    }
}
