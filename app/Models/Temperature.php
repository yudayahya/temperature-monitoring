<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Temperature extends Model
{
    use HasFactory;

    protected $fillable = ['temperature', 'ph', 'time'];

    public function fish_pool()
    {
        return $this->belongsTo(FishPool::class);
    }
}
