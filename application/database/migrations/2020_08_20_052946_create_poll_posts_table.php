<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePollPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('poll_posts', function (Blueprint $table) {
            $table->id();
            $table->integer('post_id');
            $table->string('title');
            $table->text('note')->nullable();
            $table->timestamps();
            $table->SoftDeletes();
        });

        Schema::create('poll_options', function (Blueprint $table) {
            $table->id();
            $table->string('poll_post_id');
            $table->string('qustion');
            $table->string('support')->nullable();
            $table->timestamps();
            $table->SoftDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('poll_posts');
    }
}
