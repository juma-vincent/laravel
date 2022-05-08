<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [
        'title',
        'content'

    ];

    public function user(){              
        return $this->belongsTo(User::class);
    }

    public function image(){        
        return $this->morphOne(Image::class, 'imageable');
    }

    public function comments(){
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function tags(){
        return $this->morphToMany(Tag::class, 'taggable');
    }

    protected $dates = ['deleted_at'];
}
