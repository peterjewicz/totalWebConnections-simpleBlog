<?php

namespace totalWebConnections\simpleBlog\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $table = 'simpleBlog_posts';

    public function tags(){
        return $this->belongsToMany('totalWebConnections\simpleBlog\Models\Tag', 'simpleBlog_tagRelationships', 'post_id', 'tag_id');
    }

    public function generateTags($tags, $postId){
        $tags = explode(",", $tags);

        foreach($tags as $tag){

            //set it to lower and trim so we don't get weird duplicates
            $tag = strtolower(trim($tag));

            //check to see if this tag exists in the tag table
            //if it does the ID is here
            $tagId = Tag::checkTagExists($tag);

            //if not, save it there, get the id
            if(!$tagId){
                $TagObject = new Tag;
                $TagObject->tag_title = $tag;
                $TagObject->save();
                $tagId = $TagObject->tag_id;
            }
            $TagRelationship = new TagRelationship;
            $TagRelationship->post_id = $postId ;
            $TagRelationship->tag_id = $tagId ;
            $TagRelationship->save();

        }
    }

}
