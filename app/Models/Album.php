<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $connection = 'pia';
    
    protected $fillable = [
        'salsah_id',
        'title',
        'label',
        'signature',
        'description',
    ];
}
