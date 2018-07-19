<?php

namespace totalWebConnections\simpleBlog\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $table = 'simpleBlog_posts';

    public function tags(){
        return $this->belongsToMany('totalWebConnections\simpleBlog\Models\Tag', 'simpleBlog_tagRelationships', 'post_id', 'tag_id');
    }


    /**
    * Generates the tags for a post on create
    * @param String $tags a comma separated string of tags
    * @param int $postId id of the post to add the tags to
    * @return void
    */
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


    /**
    * gets the post exceprt
    * @param int excerptLength length of exceprt (Default 200)
    * @return string
    */
    public function getExcept($excerptLength = 200){
        return str_limit(strip_tags(html_entity_decode($this->post)), $limit = $excerptLength, $end = '...');
    }

    /**
    * Gets the url for the post based on title or custom url
    * @return string
    */
    public function getPostUrl(){
        if($this->customUrl){
            return $this->customUrl;
        } else {
            return str_replace(' ', '-', $this->title);
        }
    }




}
