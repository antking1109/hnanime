<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('title');
            $table->string('slug', 200)->nullable(false)->unique();
            $table->longText('content');
            $table->text('seo_title');
            $table->text('seo_description');
            $table->text('thumb');
            $table->tinyInteger('status')->default(0)->comment('0: No index | 1: Index');
            $table->tinyInteger('is_page')->default(0)->comment('0: Post | 1: Page');
            $table->unsignedBigInteger('author');
            $table->unsignedBigInteger('cat_id');
            $table->foreign('author')->references('id')->on('users');
            $table->foreign('cat_id')->references('id')->on('categories');
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
        Schema::dropIfExists('posts');
    }
}
