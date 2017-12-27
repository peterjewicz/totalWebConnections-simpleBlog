<?php

namespace totalWebConnections\simpleBlog\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use totalWebConnections\simpleBlog\Models\Post;
use totalWebConnections\simpleBlog\Models\Tag;
use totalWebConnections\simpleBlog\Models\TagRelationship;



class postController extends Controller
{
    public function index(){
        // $exists = Storage::disk('s3')->exists('file.jpg');
        // $test = Storage::disk('s3')->put('fbcover.jpg', public_path() . '/images/fbcover.jpg');
        // $fileName = '../../../../public/images/fbcover.jpg';
        // $path = Storage::putFile('test', file($fileName));
        // var_dump($test);die;
        // $exists = Storage::disk('s3')->exists('fbcover.jpg');
        // $img = Storage::disk('s3')->get('fbcover.jpg');
        // var_dump($path);
        $posts = Post::all();
        return view('simpleBlog::dashboard')->with('posts', $posts);
    }

    public function newPost(){
        return view('simpleBlog::new');
    }

    public function showBlog($tag = ""){
        //tag categories use the same display page just select differenly
        if($tag){
            $tag = Tag::where('tag_title', $tag)->first();

            $posts = array();
            foreach($tag->posts as $post){
                array_push($posts, $post);

                //reverse the posts to show newest first
                $posts = array_reverse($posts);
            }
        } else {
            $posts = Post::all();
        }

        foreach($posts as $post){
            $post->post = json_decode($post->post);
        }

        $posts = $posts->reverse();
        return view('simpleBlog::home')->with('posts', $posts);
    }

    public function editPost($id, Request $request){
        $post = Post::find($id);
        $tagList = '';
        foreach ($post->tags as $tag) {
            $tagList .= $tag->tag_title . ',';
        }
        //remove last comma
        $tagList = substr($tagList, 0, -1);
        $post->tagList = $tagList;

        $post->post = json_decode($post->post);

        $response = $request->session()->get('status');


        return view('simpleBlog::edit')->with('post', $post)->with('response', $response);
    }

    public function confirmEdit(Request $request){
        $post = Post::find($_POST['postId']);
        $title = $_POST['title'];
        $imgUrl = $_POST['mainImage'];
        $tags = array_filter(explode(",", $_POST['tags']));
        $customUrl = $_POST['customUrl'];
        $metaDescription = $_POST['metaDescription'];

        Tag::editExistingTags($tags, $post);

        $postText = json_encode(htmlspecialchars($_POST['post']));
        $post->title = $title;
        $post->post = $postText;
        $post->imageUrl = $imgUrl;
        $post->customUrl = $customUrl;
        $post->metaDescription = $metaDescription;
        $post->save();
        $request->session()->flash('status', 'Post Updated!');
        return redirect('blog/edit/' . $_POST['postId']);
    }



    public function savePost(Request $request){
        //TODO change these to use built in Laravel Request
        $title = $_POST['title'];
        $imgUrl = $_POST['mainImage'];
        $postText = json_encode(htmlspecialchars($_POST['post']));
        $tags = $_POST['tags'];
        $customUrl = $_POST['customUrl'];
        $metaDescription = $_POST['metaDescription'];

        $post = new Post();
        $post->title = $title;
        $post->post = $postText;
        $post->imageUrl = $imgUrl;
        $post->customUrl = $customUrl;
        $post->metaDescription = $metaDescription;
        $post->save();

        $post->generateTags($tags, $post->id);
        //TODO add a redirect with success
        var_dump("success!"); die;
    }

    public function showPost($title){

        //check for the meta title first
        $post = Post::where('customUrl', $title)->first();

        //if not found default to post titles
        if(!$post){
            $title = str_replace('-', ' ', $title);
            $post = Post::where('title', $title)->first();
        }

        //neither of those work so 404
        if($post === null){
            //todo add 404 redirect
            echo('404 here');
            die;
        }

       $post->post = json_decode($post->post);
       return view('simpleBlog::post')->with('post', $post);
    }
}
