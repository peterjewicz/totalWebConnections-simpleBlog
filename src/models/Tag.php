<?php

namespace totalWebConnections\simpleBlog\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'simpleBlog_tags';
    protected $primaryKey = 'tag_id';

    /**
    * Checks to see if a tag already exists
    * Returns the tag id on success or false
    * @param string $tag
    * @return (on success) int ID of tag
    * @return (on fail) bool false
    */
    public static function checkTagExists($tag){

        $item = Tag::where('tag_title', $tag)->first();

        if($item){
            return $item->tag_id;
        }else{
            return false;
        }

    }
}
