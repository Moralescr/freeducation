<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'status'];

    public function commentable()
    {
        $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    
    //Relation one to many morph
    public function comments()
    {
        return $this->morphMany('App\Models\Comment', 'commentable');
    }

    public function reactions()
    {
        return $this->morphMany('App\Models\Reaction', 'reactionable');
    }

    
}
