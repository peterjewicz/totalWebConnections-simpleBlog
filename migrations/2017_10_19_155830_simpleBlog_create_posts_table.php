<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SimpleBlogCreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('simpleBlog_posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('post');
            $table->text('imageUrl');
            $table->string('customUrl');
            $table->text('metaDescription');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('simpleBlog_posts');
    }
}
