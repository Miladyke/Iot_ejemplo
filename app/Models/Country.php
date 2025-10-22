<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'code',
        'abbrev',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function departments()
    {
        return $this->hasMany(Department::class, 'id_country');
    }
}