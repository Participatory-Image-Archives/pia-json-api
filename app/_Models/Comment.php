<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Image;
use App\Models\Collection;

class Comment extends Model
{
    protected $connection = 'pia';
    
    protected $fillable = [
        'comment',
    ];

    public function images()
    {
        return $this->belongsToMany(Image::Class, 'image_comment', 'comment_id', 'image_id');
    }

    public function collections()
    {
        return $this->belongsToMany(Image::Class, 'collection_comment', 'comment_id', 'collection_id');
    }
}
