<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    protected $fillable = ['name', 'path'];

    public function certificates()
    {
        return $this->hasMany(Certificate::class);
    }
}
