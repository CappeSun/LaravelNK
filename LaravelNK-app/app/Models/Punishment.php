<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Site;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Punishment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function sites()
    {
        return $this->HasMany(Site::class);
    }
}
