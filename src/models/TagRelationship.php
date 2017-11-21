<?php

namespace totalWebConnections\simpleBlog\Models;

use Illuminate\Database\Eloquent\Model;

class TagRelationship extends Model
{
    protected $table = 'simpleBlog_tagRelationships';
    public $primaryKey = 'tagRelationship_id';


    public function posts()
    {
        return $this->hasMany('totalWebConnections\simpleBlog\Models\Post');
    }
}
