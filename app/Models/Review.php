<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // Relation one to many (Inverse)
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    } 

    // Relation one to many
    public function course()
    {
        return $this->hasMany('App\Models\Course');
    }
}
