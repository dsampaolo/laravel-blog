<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablesDsampaoloBlog extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{

        Schema::create('dsampaolo_blog_categories', function(Blueprint $table) {
            $table->increments('id');

            $table->string('name');

            $table->timestamps();
        });

        Schema::create('dsampaolo_blog_options', function(Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            $table->string('value');

            $table->timestamps();
        });

		Schema::create('dsampaolo_blog_posts', function(Blueprint $table) {
            $table->increments('id');

            $table->string('title');
            $table->string('slug');

            $table->string('image');

            $table->text('chapo');
            $table->text('content');

            $table->integer('category_id');

            $table->dateTime('published_at');
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
		Schema::drop('dsampaolo_blog_posts');
		Schema::drop('dsampaolo_blog_categories');
	}

}
