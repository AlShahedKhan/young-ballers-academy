<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BuildingChampion extends Model
{
    // Specify the table name (optional if it matches the convention)
    protected $table = 'building_champions';

    // Allow mass assignment for these fields
    protected $fillable = [
        'title',
        'description',
        'image1',
        'image2',
        'logo',
    ];
}
