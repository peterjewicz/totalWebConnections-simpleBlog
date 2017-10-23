<?php

namespace totalWebConnections\simpleBlog\controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use totalWebConnections\simpleBlog\models\Post;

class postController extends Controller
{
    public function index(){
        $posts = Post::all();
        return view('simpleBlog::dashboard')->with('posts', $posts);
    }

    public function newPost(){
        return view('simpleBlog::new');
    }

    public function showBlog(){
        $posts = Post::all();
        foreach($posts as $post){
            $post->post = json_decode($post->post);
        }
        return view('simpleBlog::home')->with('posts', $posts);
    }



    public function savePost(Request $request){
        $title = $_POST['title'];
        $imgUrl = $_POST['mainImage'];
        $postText = json_encode(htmlspecialchars($_POST['post']));
        // $post = $_POST['post'];
        // $post = htmlspecialchars($request->input('post'));
        // $imgUrl = "http://www.totalwebconnections.com/images/logo.png";
        // echo($post);
        // var_dump($post);die;
        $post = new Post();
        $post->title = $title;
        $post->post = $postText;
        $post->imageUrl = $imgUrl;
        $post->save();

        //TODO add a redirect with success
        var_dump("success!"); die;
    }

    public function showPost($title){
        $title = str_replace('-', ' ', $title);
        $post = Post::where('title', $title)->first();

        if($post === null){
            //todo add 404 redirect
            echo('404 here');
            die;
        }

       $post->post = json_decode($post->post);
       return view('simpleBlog::post')->with('post', $post);
    }
}
