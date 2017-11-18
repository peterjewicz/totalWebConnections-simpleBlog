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

    //TODO make this more efficient in_array and array_diff are likely inefficient
    public static function editExistingTags($tags, $post){
        $currentTags = [];
        foreach ($post->tags as $tag) {
            array_push($currentTags, $tag->tag_title);
        }


        foreach($tags as $tag){
            //set it to lower and trim so we don't get weird duplicates
            $tag = strtolower(trim($tag));

            if(in_array($tag, $currentTags)){
                $tags = array_diff($tags, array($tag));
                $currentTags = array_diff($currentTags, array($tag));
            }
            else{
                $TagObject = new Tag;
                $TagObject->tag_title = $tag;
                $TagObject->save();
                $tagId = $TagObject->tag_id;

                $TagRelationship = new TagRelationship;
                $TagRelationship->post_id = $post->id ;
                $TagRelationship->tag_id = $tagId ;
                $TagRelationship->save();
            }
        }

        if(sizeOf($currentTags) > 0){
            foreach($currentTags as $tag){
                $tag = strtolower(trim($tag));
                $item = Tag::where('tag_title', $tag)->first();
                $relationShip = TagRelationship::where('tag_id', $item->tag_id)->where('post_id', $post->id)->first();
                $relationShip->delete();
            }
        }
    }
}
