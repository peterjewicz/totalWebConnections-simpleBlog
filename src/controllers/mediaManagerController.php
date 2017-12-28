<?php

namespace totalWebConnections\simpleBlog\Controllers;

//Lavavel includes
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//developer made
use totalWebConnections\simpleBlog\Models\Media;

//3rd party
use Illuminate\Support\Facades\Storage;
use Aws\S3\S3Client;
use League\Flysystem\AwsS3v3\AwsS3Adapter;
use League\Flysystem\Filesystem;

class mediaManagerController extends Controller
{

    //TODO
    //1. add support for alt tags
    //2. add custom image names optional
    //3. save reference to fiels in local DB

    public function addMediaView() {
        return view('simpleBlog::media/add');
    }


    public function addMedia(Request $request) {
        //TODO redirect here

        $path = Storage::disk('s3')->putFile('media', $request->file('media'));
        $mediaItem = new Media;
        $mediaItem->media_alt = $request->alt;
        $mediaItem->media_title = $request->title;
        $mediaItem->media_url = $path;
        $mediaItem->save();
        echo('Image Saved');
    }


    public function mediaDashboard() {

        $mediaItems = Media::all();

        foreach($mediaItems as $media) {
            $media->imageUrl = Storage::disk('s3')->url($media->media_url);
        }
        return view('simpleBlog::media/dashboard')->with('mediaItems', $mediaItems);
    }
}
