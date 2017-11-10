<?php

// use totalWebConnections\simpleBlog\controllers\postController;


// Route::get('calculator', function(){
// 	echo 'Hello from the calculator package!';
// });

Route::group(['middleware' => ['web']], function () {
    //backend routes for blog
    Route::get('blog/dashboard', 'totalWebConnections\simpleBlog\controllers\postController@index')->middleware('blogSettings')->middleware('blogAuth');
    Route::get('blog/new', 'totalWebConnections\simpleBlog\controllers\postController@newPost')->middleware('blogSettings')->middleware('blogAuth');
    Route::post('blog/new', 'totalWebConnections\simpleBlog\controllers\postController@savePost')->middleware('blogSettings')->middleware('blogAuth');

    Route::get('blog/edit/{id}', 'totalWebConnections\simpleBlog\controllers\postController@editPost')->middleware('blogSettings')->middleware('blogAuth');
    Route::post('blog/edit', 'totalWebConnections\simpleBlog\controllers\postController@confirmEdit')->middleware('blogSettings')->middleware('blogAuth');
    //registration routes
    Route::get('blog/login', 'totalWebConnections\simpleBlog\controllers\authController@displayLogin');
    Route::post('blog/login', 'totalWebConnections\simpleBlog\controllers\authController@login');
    Route::get('blog/register', 'totalWebConnections\simpleBlog\controllers\authController@displayRegister');
    Route::post('blog/register', 'totalWebConnections\simpleBlog\controllers\authController@register');

    //front end non-auth rouutes
    Route::get('blog/{title}', 'totalWebConnections\simpleBlog\controllers\postController@showPost');
    Route::get('blog', 'totalWebConnections\simpleBlog\controllers\postController@showBlog');

});
