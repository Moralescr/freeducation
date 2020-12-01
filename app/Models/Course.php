<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    
    protected $guarded = ['id', 'status'];

    const BORRADOR = 1;
    const REVISION = 2;
    const PUBLICADO = 3;

    // Relation one to many (Inverse)
    public function teacher()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    // Relation many to many
    public function students()
    {
        return $this->belongsToMany('App\Models\User');
    }

    // Relation one to many
    public function reviews()
    {
        return $this->hasMany('App\Models\Review');
    }

    // Relation one to many
    public function level()
    {
        return $this->belongsTo('App\Models\Level');
    }

    // Relation one to many
    public function price()
    {
        return $this->belongsTo('App\Models\Price');
    }

    // Relation one to many
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function requirements()
    {
        return $this->hasMany('App\Models\Requirement');
    }

    public function goals()
    {
        return $this->hasMany('App\Models\Goal');
    }

    public function audiences()
    {
        return $this->hasMany('App\Models\Audience');
    }

    public function sections()
    {
        return $this->hasMany('App\Models\Section');
    }

    //Relation Morph
    public function image()
    {
        return $this->morphOne('App\Models\Image', 'imageable');
    }

    public function lessons()
    {
        return $this->hasManyThrough('App\Models\Lesson', 'App\Models\Section');
    }
  
}
