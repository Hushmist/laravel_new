<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubcategoryParameter extends Model
{
    use HasFactory;

    protected $table = 'subcategory_parameters';
    protected $fillable = [
        'name',
        'subcategory_id'
    ];
}
