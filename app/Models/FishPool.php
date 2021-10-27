<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FishPool extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function temperatures()
    {
        return $this->hasMany(Temperature::class);
    }
}
