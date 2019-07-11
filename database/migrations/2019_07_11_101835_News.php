<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class News extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->text('author')->nullable();
            $table->text('title');
            $table->text('description')->nullable();
            $table->text('url');
            $table->text('urlToImage')->nullable();
            $table->text('country');
            $table->text('category');
            $table->timestamp('publishedAt');
            $table->timestamp('creation_date');
            $table->timestamp('last_update');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('news');
    }
}
