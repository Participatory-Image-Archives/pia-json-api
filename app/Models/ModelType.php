<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelType extends Model
{
    protected $connection = 'pia';
    protected $table = 'model';
    
    protected $fillable = [
        'label',
        'comment',
    ];
}
