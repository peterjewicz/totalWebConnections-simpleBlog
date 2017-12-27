<?php

namespace totalWebConnections\simpleBlog\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


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
        echo($path);
        echo('Image Saved');
    }


    public function mediaDashboard() {
        $files = Storage::disk('s3')->url('media/wfirM3k5gTxkighrBFonDmXJsvBZUSfWICTTtnXP.png');
        var_dump($files);
        echo('<img src="'.$files.'" />');
    }
}
